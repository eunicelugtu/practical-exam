<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost()
    {
        return view('create-post');
    }

    public function savePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|max:100',
            'body' => 'string|max:10000'
        ]);

        Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('showTimeline')
            ->with('success', 'Registration successful! Welcome aboard!');
    }

    public function showPost(Request $request)
    {
        $post = Post::find($request->id);
        return view('post', compact('post'));
    }

    public function editPost(Request $request)
    {
        $post = Post::find($request->id);
        if ($post->user_id !== Auth::id())
        {
            return redirect()->route('showPost', ['id' => $post->id])->with('error', 'Unauthorized action.');
        }
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|max:200',
            'body' => 'string|max:10000'
        ]);

        $post = Post::find($request->id);
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect()->route('showPost', ['id' => $post->id])
            ->with('success', 'Post updated successfully!');
    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->id);

        if ($post->user_id !== Auth::id())
        {
            return redirect()->route('showPost', ['id' => $post->id])->with('error', 'Unauthorized action.');
        }
        if ($post)
        {
            $post->delete();
        }

        return redirect()->route('showTimeline')->with('success', 'Post deleted.');
    }
}
