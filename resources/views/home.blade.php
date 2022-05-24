@extends('layouts.app')
@section('title','Home Blog')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center">Selamat Datang Di Blog</h1>
            @foreach($posts as $post)
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4><a href="{{ route('show', $post->slug) }}">{{ $post->title }}</a></h4><br/>
                        <div>{{ $post->description }}</div>
                    </div>
                    <div class="ms-auto">{{ $post->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
