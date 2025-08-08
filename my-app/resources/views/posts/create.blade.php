{{-- cSpell: disable --}}

@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
<div class="grid grid-cols-1 gap-4 my-2">
    <h1 class="text-center font-bold">新規投稿</h1>
    <form action="{{route('post.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"> 
        </div>
        <div class="mb-6">
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">内容</label>
            <textarea name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-14 cursor-pointer hover:bg-blue-700 font-bold">投稿</button>
    </form>
</div>
@endsection
