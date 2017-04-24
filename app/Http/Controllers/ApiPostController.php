<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class ApiPostController extends Controller
{
    public function index()
    {
        return Post::all();
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

        return $post;
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

        return $post;
    }

    public function destroy($post_id)
    {
        try {
            Post::destroy($post_id);
        } catch (Exception $e) {
            return abort(404);
        }

        return true;
    }

    public function show($post_id)
    {
        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        }

        return $post;
    }

}
