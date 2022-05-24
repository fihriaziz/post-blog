@extends('layouts.app')
@section('title','Show Blog')
@push('after-style')
    <style>
        .child-comment{
            padding-left: 50px
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <h3 class="text-center">{{ $post->title }}</h3>
                <div class="text-center mt-5">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-gray-100">
                                    {{ $post->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    Post Oleh : {{ $post->user->name }}
                </div>
            </div>

            <form action="{{ route('comment') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                <div class="mt-4 input-group input-group-outline" id="formReply">
                    <textarea name="comment" id="comment" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary mt-3">Post Comment</button>
                </div>
            </form>

                <div class="like-wrapper">
                    <div class="btn btn-success mt-3 btn-like" data-model-id="{{ $post->id }}" data-type="1">Like</div>
                    <span class="like_number" style="display: block">0 </span> Like
                </div>


        </div>
        <div class="row">
            @forelse ($post->comments as $comment)
                <div class="col-md-8">
                    <div class="card mt-3">
                        <div class="card-body">
                            {{ $comment->comment }}
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="javascript:void(0)" onclick="replyComment({{ $comment->id }}, '{{ $comment->comment }}')" id="reply">Reply</a>
                        </div>
                    </div>
                </div>
                @foreach ($comment->child as $item)
                    <div class="col-md-4">
                        <div class="mt-5">
                            <div class="card child-comment">
                                <div class="card-body">
                                    <div>{{ $item->name }}</div>
                                    <div>{{ $item->comment }}</div>
                                    <a href="javascript:void(0)" onclick="replyComment({{ $comment->id }}, '{{ $comment->comment }}')" id="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                <span>Tidak ada comment</span>
            @endforelse
        </div>
    </div>
@endsection
@push('after-script')
    <script>
        function replyComment(id, title){
            $('#formReply').show();
            $('#parent_id').val(id)
            $('#comment').val(title)
        }

        $(document).ready(function() {
            $('.btn-like').on('click', function(){
            let _this = $(this);
            let _url = '/like/' + _this.attr('data-model-id')
                + "/" + _this.attr('data-type');

                $.get(_url, function(data){
                    _this.addClass('btn-danger').html('dislike');
                    let likeNumber = _this.parents('.like-wrapper').find('.like_number');
                    likeNumber.html(parseInt(likeNumber.html()) + 1);
                })
            })


        })
    </script>
@endpush
