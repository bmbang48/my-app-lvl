<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // jika storage tidak terbaca maka ubah filesystem.php
        $posts = Post::active()->get();
        $view_data = [
            'posts' => $posts,
        ];
        return view('posts.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // SELECT ... FROM posts WHERE id = $id
        $post = Post::where('id', '=', $id)
            ->first(); // mendapatkan singel data pertama 
        $comments = $post->comments()->limit(2)->get();
        $total_comments = $post->total_comments();
        $view_data = [
            'post' => $post,
            'comments' => $comments,
            'total_comments' => $total_comments
        ];
        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where('id', '=', $id)
            ->first();
        $view_data = [
            'post' => $post
        ];
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // UPDATE ... WHERE id = $id
        Post::where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        // dd($post);

        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)
            ->delete();

        return redirect('posts');
    }
    public function api()
    {
        $dataPosts = Post::get();

        return response()->json()([
            'status' => true,
            'message' => 'Data Postingan ditemukan',
            'data' => $dataPosts
        ], 200);
    }
}
