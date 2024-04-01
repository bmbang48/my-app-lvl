@extends('layouts.app')

@section('title', 'Tambah Postingan')

@section('content')
<h1>Buat Postingan Baru</h1>
<form method="POST" action="{{ url('posts') }}" class="form-control">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Konten</label>
        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Simpan</button>
</form>
@endsection