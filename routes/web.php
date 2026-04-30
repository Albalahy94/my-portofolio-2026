<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Public Routes
Route::get('/', function () {
    $programmingProjects = \App\Models\Project::with(['tags'])->published()->type(\App\Models\Project::TYPE_PROGRAMMING)->latest()->take(6)->get();
    $lifeProjects = \App\Models\Project::with(['tags'])->published()->type(\App\Models\Project::TYPE_LIFE)->latest()->take(6)->get();

    $technicalSkills = \App\Models\Skill::type(\App\Models\Skill::TYPE_TECHNICAL)->orderBy('proficiency', 'desc')->get();
    $generalSkills = \App\Models\Skill::type(\App\Models\Skill::TYPE_GENERAL)->orderBy('proficiency', 'desc')->get();
    
    $posts = \App\Models\Post::with('categories')->published()->latest()->take(3)->get();
    $timelineProjects = \App\Models\Project::published()->where('show_on_timeline', true)->latest()->get();
    
    return view('home', compact('programmingProjects', 'lifeProjects', 'technicalSkills', 'generalSkills', 'posts', 'timelineProjects'));
})->name('home');

Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Language Switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        Session::put('locale', $locale);
        Session::save(); // Force save to ensure middleware sees it
    }
    return redirect()->back();
})->name('lang.switch');

// Projects
Route::resource('projects', \App\Http\Controllers\ProjectController::class)->only(['index', 'show']);

// Offers
Route::get('/offers/{offer}', function ($offer) {
    if (view()->exists('offers.' . $offer)) {
        return view('offers.' . $offer);
    }
    abort(404);
})->name('offers.show');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Short Link Redirect
Route::get('/go/{code}', [\App\Http\Controllers\Admin\ShortLinkController::class, 'redirect'])->name('short-links.redirect');

// Production Image Fix (Bypassing Symlinks)
Route::get('storage/{any}', function ($any) {
    $path = storage_path('app/public/' . $any);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('any', '.*');

// User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
});

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // --- SHARED ADMIN ROUTES ---
    Route::get('/dashboard', function (\App\Services\InsightService $insightService) {
        $insightService->generateInsights();
        $stats = [
            'total_visits' => \App\Models\Visit::real()->count(),
            'today_visits' => \App\Models\Visit::real()->whereDate('created_at', \Carbon\Carbon::today())->count(),
            'total_posts' => \App\Models\Post::count(),
            'total_projects' => \App\Models\Project::count(),
        ];
        return view('dashboard', compact('stats'));
    })->name('dashboard');

    Route::post('/dashboard/layout', [\App\Http\Controllers\Admin\DashboardLayoutController::class, 'update'])->name('dashboard.layout');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notifications (Shared for all admin staff)
    Route::get('/notifications', [App\Http\Controllers\Admin\AdminNotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [App\Http\Controllers\Admin\AdminNotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [App\Http\Controllers\Admin\AdminNotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    Route::delete('/notifications/{notification}', [App\Http\Controllers\Admin\AdminNotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('/notifications/unread-count', [App\Http\Controllers\Admin\AdminNotificationController::class, 'getUnreadCount'])->name('notifications.unread-count');

    // --- MODERATOR & EDITOR SHARED ---
    Route::middleware('role:moderator,editor')->group(function () {
        // Task Manager
        Route::get('/tasks', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks.index');
        Route::post('/tasks', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');
        Route::patch('/tasks/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'destroy'])->name('tasks.destroy');
    });

    // --- EDITOR ONLY (Content Management) ---
    Route::middleware('role:editor')->group(function () {
        // Short Links
        Route::get('/short-links', [\App\Http\Controllers\Admin\ShortLinkController::class, 'index'])->name('short-links.index');
        Route::post('/short-links', [\App\Http\Controllers\Admin\ShortLinkController::class, 'store'])->name('short-links.store');
        Route::delete('/short-links/{link}', [\App\Http\Controllers\Admin\ShortLinkController::class, 'destroy'])->name('short-links.destroy');

        // Blog
        Route::get('posts', \App\Livewire\Admin\Posts\PostList::class)->name('posts.index');
        Route::get('posts/create', \App\Livewire\Admin\Posts\PostForm::class)->name('posts.create');
        Route::get('posts/{post}/edit', \App\Livewire\Admin\Posts\PostForm::class)->name('posts.edit');
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);

        // Projects
        Route::get('projects', \App\Livewire\Admin\Projects\ProjectList::class)->name('projects.index');
        Route::get('projects/create', \App\Livewire\Admin\Projects\ProjectForm::class)->name('projects.create');
        Route::get('projects/{project}/edit', \App\Livewire\Admin\Projects\ProjectForm::class)->name('projects.edit');
    });

    // --- MODERATOR ONLY (Community Management) ---
    Route::middleware('role:moderator')->group(function () {
        Route::get('/comments', [\App\Http\Controllers\Admin\CommentController::class, 'index'])->name('comments.index');
        Route::patch('/comments/{comment}/approve', [\App\Http\Controllers\Admin\CommentController::class, 'approve'])->name('comments.approve');
        Route::delete('/comments/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');

        Route::get('/reviews', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
        Route::patch('/reviews/{review}/approve', [\App\Http\Controllers\Admin\ReviewController::class, 'approve'])->name('reviews.approve');
        Route::delete('/reviews/{review}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');
    });

    // --- ADMIN ONLY (System & Users) ---
    Route::middleware('role:admin')->group(function () {
        // Analytics
        Route::get('/analytics', [\App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('analytics.index');

        // Skills
        Route::patch('skills/{skill}/restore', [\App\Http\Controllers\Admin\SkillController::class, 'restore'])->name('skills.restore');
        Route::delete('skills/{skill}/force-delete', [\App\Http\Controllers\Admin\SkillController::class, 'forceDelete'])->name('skills.force-delete');
        Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);

        // Users
        Route::patch('users/{id}/restore', [\App\Http\Controllers\Admin\UserController::class, 'restore'])->name('users.restore');
        Route::delete('users/{id}/force-delete', [\App\Http\Controllers\Admin\UserController::class, 'forceDelete'])->name('users.force-delete');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

        // Settings
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

        // Health
        Route::get('/health', [App\Http\Controllers\Admin\HealthController::class, 'index'])->name('health.index');
        Route::post('/health/clear', [App\Http\Controllers\Admin\HealthController::class, 'clearCache'])->name('health.clear-cache');
    });
});

require __DIR__.'/auth.php';
