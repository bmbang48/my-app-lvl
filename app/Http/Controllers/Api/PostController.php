<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataPost = Post::OrderBy('id', 'asc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data Post ditemukan',
            'data' => $dataPost
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dataPost = new Post;

        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
                'data' => $validator->errors()
            ]);
        }

        $dataPost->title = $request->title;
        $dataPost->content = $request->content;

        $dataPost->save();
        return response()->json([
            'status' => true,
            'message' => 'Data Postingan Berhasil Disimpan',
            'data' => $dataPost
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dataPost = Post::find($id);
        if ($dataPost) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Ditemukan',
                'data' => $dataPost
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak ditemukan',
                'data' => null
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dataPost = Post::find($id);

        if (!$dataPost) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak ditemukan',
            ], 404);
        }

        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
                'data' => $validator->errors()
            ]);
        }

        $dataPost->title = $request->title;
        $dataPost->content = $request->content;

        $dataPost->update();
        return response()->json([
            'status' => true,
            'message' => 'Data Postingan Berhasil Diubah',
            'data' => $dataPost
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPost = DB::table('posts')->where('id', $id)->delete();
        // $databaru = Post::get();

        if (!$dataPost) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data post berhasil dihapus',
        ], 200);
    }
}
