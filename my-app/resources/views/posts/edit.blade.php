{{-- cSpell: disable --}}

@extends('layouts.app')

@section('title', '投稿編集')

@section('content')
<div class="grid grid-cols-1 gap-4 my-2">
    <div class="text-left">
        <a href="{{ route('post.show',['post'=> $post]) }}" class="bg-white hover:bg-gray-700 text-gray hover:text-white outline outline-1 py-2 px-4 mx-4 rounded cursor-pointer">戻る</a>
    </div>
    <h1 class="text-center font-bold">投稿の編集</h1>
    <form action="{{route('post.update')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"> 
        </div>
        <div class="mb-6">
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">内容</label>
            <textarea name="body" id="body"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight">{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-blue-700 font-bold">更新</button>
    </form>
</div>
@endsection
