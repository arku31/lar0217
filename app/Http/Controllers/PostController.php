<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Events\UserCommentedArticleEvent;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use League\Flysystem\Exception;

class PostController extends Controller
{
    public function index()
    {
        Log::error('asd');
        $user = Auth::user();

        if (!$user->can('edit articles')) {
            abort(403);
        }

        $posts = Post::all();
        $data['posts'] = $posts;
        return view('posts.index', $data);
    }

    public function create()
    {
        event(new PostCreated('asd'));
        event(new UserCommentedArticleEvent('asd'));
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|min:5',
           'content' => 'required|min:5',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();
        event(new PostCreated($post));

        return redirect('/posts');
    }

    public function edit($post_id)
    {
        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        }

        $data['post'] = $post;
        return view('posts.edit', $data);
    }

    public function update(Request $request, $post_id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:5',
        ]);
        try {
            $post = Post::findOrFail($post_id);
        }
        catch (Exception $e) {
            return abort(404);
        }
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/posts/edit/'.$post_id);
    }

    public function destroy($post_id)
    {
        try {
            Post::destroy($post_id);
        } catch (Exception $e) {
            return abort(404);
        }

        return redirect('/posts');
    }

    public function GrantRole($user_id)
    {
        $user = User::find($user_id);

        return $user->assignRole('writer');
    }

    public function calc($x)
    {
        return $x * 2;
    }

}
