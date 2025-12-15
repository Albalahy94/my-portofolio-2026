<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Public Routes
Route::get('/', function () {
    $programmingProjects = \App\Models\Project::with(['tags'])->type(\App\Models\Project::TYPE_PROGRAMMING)->latest()->take(6)->get();
    $lifeProjects = \App\Models\Project::with(['tags'])->type(\App\Models\Project::TYPE_LIFE)->latest()->take(6)->get();

    $technicalSkills = \App\Models\Skill::type(\App\Models\Skill::TYPE_TECHNICAL)->orderBy('proficiency', 'desc')->get();
    $generalSkills = \App\Models\Skill::type(\App\Models\Skill::TYPE_GENERAL)->orderBy('proficiency', 'desc')->get();
    
    $posts = \App\Models\Post::with('categories')->where('is_published', true)->latest()->take(3)->get();
    return view('home', compact('programmingProjects', 'lifeProjects', 'technicalSkills', 'generalSkills', 'posts'));
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

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    
    // Settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/fix-images', function () {
    $p = \App\Models\Project::first();
    if (!$p) return 'No projects found';
    
    // Update to a file we know exists from previous ls command
    $p->image = 'projects/MgEBx5bUoexsZLJSNfhqHlDhHtBIXtMpRSvwBxPZ.png'; 
    $p->save();
    
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    
    return "Fix Applied! Image updated to: " . $p->image . ". <br> <a href='/projects'>Go to Projects</a>";
});
