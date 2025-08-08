{{-- cSpell: disable --}}

@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
<div class="grid grid-cols-1 gap-4 my-4">
    <div>
        <a href="/post/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">新規投稿</a>
    </div>
    @foreach ($posts as $post)
    <div class="overflow-hidden rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto shadow-md">
    <a href="{{route('post.show',['post' => $post])}}" class="w-full block h-full">
        <img alt="blog photo" src="https://picsum.photos/200" class="max-h-40 w-full">
        <div class="bg-white dark:bg-gray-800 w-full p-4">
        <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
            {{ $post->title }}
        </p>
        <p class="text-gray-600 dark:text-gray-300 font-light text-md">
            {{ $post->body }}
        </p>
        </div>
    </a>
    </div>
    @endforeach
</div>
@endsection
