<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = \App\Models\Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'slug' => 'required|unique:posts,slug|alpha_dash',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $validated['user_id'] = auth()->id();
        if ($request->is_published) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post = \App\Models\Post::create($validated);
        
        if ($request->has('categories')) {
            $post->categories()->sync($request->categories);
        }

        return redirect()->route('admin.posts.index')->with('success', 'تم إنشاء المقال بنجاح');
    }

    public function show(string $id)
    {
        // Not used in admin usually, usually implies 'edit' or preview
        return redirect()->route('blog.show', \App\Models\Post::findOrFail($id)->slug);
    }

    public function edit(string $id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $post = \App\Models\Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'slug' => 'required|alpha_dash|unique:posts,slug,' . $post->id,
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        if (isset($request->is_published) && $request->is_published && !$post->is_published) {
             $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        } else {
             unset($validated['featured_image']);
        }

        $validated['is_published'] = $request->has('is_published');

        $post->update($validated);

        if ($request->has('categories')) {
            $post->categories()->sync($request->categories);
        } else {
            $post->categories()->detach(); // If no categories selected, detach all
        }

        return redirect()->route('admin.posts.index')->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroy(string $id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'تم حذف المقال');
    }
}
