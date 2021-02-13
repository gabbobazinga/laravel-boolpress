@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
                <th><h2>Title</h2></th>
                <th><h2>Author</h2></th>
                <th><h2>Category</h2></th>
                <th><h2>Content</h2></th>
                @auth
                <th></th>
                <th></th>
                <th><a class="btn btn-success" href=" {{ route('posts.create') }} "> CREATE </a></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->postUser->name }}</td>
                    <td>{{ $post->categorie->title }}</td>
                    <td class="description_fix"><span>{{ $post->postInfo->description }} </span> </td>
                    <td>
                       <a class="btn btn-info btn-sm" href=" {{ route('posts.show', $post) }} "> SHOW </a>
                    </td>
                    @auth
                        @if ($post->postUser->id == $user->id | $user->isAdmin == 1)
                            <td>
                                <a class="btn btn-warning btn-sm" href=" {{ route('posts.edit', $post) }} "> EDIT </a>
                            </td>
                            <td>
                                <form action=" {{ route('posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-sm btn-danger" type="submit" value="DELETE">
                                </form>
                            </td>
                        @else
                            
                        @endif
                    @endauth
                </tr>
            @endforeach
    </table>
</div>
@endsection