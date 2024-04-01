@extends('layouts.app')

@section('title',"Edit : $post->title")
@section('content')

<h1>Edit Postingan</h1>
<form method="POST" action='{{ url("posts/$post->id") }}' class="form-control">
    @method('PATCH')
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Konten</label>
        <textarea class="form-control" id="content" rows="3" name="content">{{$post->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-danger">Simpan</button>
</form>
<form method="POST" action="{{url("posts/$post->id")}}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>
@endsection
</div>