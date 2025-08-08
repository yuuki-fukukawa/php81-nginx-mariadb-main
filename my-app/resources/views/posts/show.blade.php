{{-- cSpell: disable --}}

@extends('layouts.app')

@section('title', '投稿詳細')

@section('content')
<div class="grid grid-cols-1 gap-4 my-4">

    <div class="overflow-hidden rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto shadow-md">
        <img alt="blog photo" src="https://picsum.photos/200" class="max-h-40 w-full">
        <div class="bg-white dark:bg-gray-800 w-full p-4">
        <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
            {{ $post->title }}
        </p>
        <p class="text-gray-600 dark:text-gray-300 font-light text-md">
            {{ $post->body }}
        </p>
        </div>
    </div>
    <div class="grid grid-cols-1">
        <div class="justify-self-center mb-8">
            <a class="text-green-700 hover:text-white hover:bg-green-700 rounded w-36 text-center py-2 px-4 border" href="{{route('post.edit', ['post'=> $post])}}">編集する</a>
        </div>
        <div class="justify-self-center">
            <form action="{{route('post.delete', ['post'=> $post])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-700 rounded w-36 text-center py-2 px-4 border focus:ring-4 focus:outline" href="{{route('post.delete', ['post'=> $post])}}">投稿削除</button>
            </form>
        </div>
    </div>
</div>
@endsection
