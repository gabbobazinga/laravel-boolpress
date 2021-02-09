@extends('layouts.app')

@section('content')

<div class="container">     
    <div class="jumbotron py-4">         
        <h1 class="">Create Post Detail</h1>         
        <hr class="my-3">
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            @method('post')
            <div class="form-group row">
                <label for="inputPostTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostTitle" name="inputPostTitle" placeholder="enter title...">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPostAuthor" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostAuthor" name="inputPostAuthor" placeholder="enter author...">
                </div>
            </div>
            <div class="form-group row">
                <label for="chooseCategory" class="col-sm-2 col-form-label">Choose Category:</label>
                <div class="col-sm-10"> 
                    <select class="form-control" name="inputPostCategory" id="chooseCategory">
                        <option value="null" selected> --- </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"> {{$category->title}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPostInfo" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputPostAuthor" name="inputPostInfo" placeholder="enter description..." rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Choose Tags</p>
                <div class="col-sm-10 d-flex justify-content-between align-items-end">
                    @foreach ($tags as $tag)
                    <div>
                        <input type="checkbox" name="inputPostTags[]" id="{{ $tag->tag }}" value="{{ $tag->id}}">
                        <label for="{{ $tag->tag }}">{{ $tag->tag }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <a class="btn btn-primary" href=" {{route('posts.index')}} ">Back</a>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"> Create </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
