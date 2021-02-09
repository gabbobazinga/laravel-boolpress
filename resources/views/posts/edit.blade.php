@extends('layouts.app')

@section('content')

<div class="container">     
    <div class="jumbotron py-4">         
        <h1 class="">Modify Post Detail</h1>         
        <hr class="my-3">
        <form method="post" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                   <input class="form-control" type="text" name="inputTitle" id="inputTitle" value="{{ $post->title }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAuthor" class="col-sm-2 col-form-label">Author:</label>
                <div class="col-sm-10">
                   <input class="form-control" type="text" name="inputAuthor" id="inputAuthor" value="{{ $post->author }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="chooseCategory" class="col-sm-2 col-form-label">Choose Category:</label>
                <div class="col-sm-10"> 
                    <select class="form-control" name="inputPostCategory" id="chooseCategory">
                        <option value="null" selected> --- </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$post->categorie->id == $category->id ? 'selected' : '' }}>
                                {{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputInfo" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                   <textarea class="form-control" name="inputInfo" id="inputInfo" rows="5">{{ $post->postInfo->description }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tags:</label>
                <div class="col-sm-10 ">
                    @foreach ($tags as $tag)
                    <div>
                        <input type="checkbox" id="selectTags" name="selectTags[]" value="{{ $tag->id}}"{{ $post->tags->contains($tag) ? 'checked' : '' }} >  
                        <label for="selectTags" class="col-sm-2 col-form-label">{{ $tag->tag }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <a class="btn btn-success" href=" {{route('posts.index')}} ">Back</a>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"> Update </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
