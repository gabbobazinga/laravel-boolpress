@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <h2>Title: {{$post->title }}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Author: {{ $post->postUser->name }}</h5>
            <p class="card-text">Category: {{ $post->categorie->title }}</p>
        </div>
        <div class="card-footer text-muted">
            <p class="card-text">Information: <br> {{$post->postInfo->description }}</p>
            <p>TAGS:</p>
            @foreach($post->tags as $tag)
            <span>{{ $tag->tag }}</span>
            @endforeach
        </div>
        <div>
            <a class="btn btn-sm btn-success" href=" {{route('posts.index')}} "> HOME </a>
        </div>
    </div>
</div>

<style>
    .card-footer span:before {
        content: '#';
    }

    .card-footer span {
        margin-left: 10px;
    }
</style>
@endsection