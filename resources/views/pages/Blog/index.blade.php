@extends('layouts.admin')
@section('title','All Blog')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($posts as $post)
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a href="/edit" class="btn btn-warning">Edit</a>
                            <form action="/delete" style="display: inline">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
