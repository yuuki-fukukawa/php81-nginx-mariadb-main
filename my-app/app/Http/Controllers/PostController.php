<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        //return view('posts.index',['posts' => $posts]);
        return Inertia::render('Welcome', [
            'posts' =>$posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //入力データのバリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = new Post();
        $result = $post->createPost($request->all());
        return redirect()->route('posts.index');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return Inertia::render('Show', [
            'post' =>$post
        ]);
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request)
    {
        //入力データのバリデーション
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);


        $postId = $request->input('id');

        //データの存在有無を確認
        Post::findOrFail($postId);

        $post = new Post();
        $result = $post->updatePost($request->all(), $postId);
        return redirect()->route('posts.index');
    }

    public function destroy(int $id)
    {
        $post = new Post();
        $result = $post->deletePost($id);
        return redirect()->route('posts.index');
    }
    


/*
    public function indexRedirect()
    {
        return redirect()->route('posts.index_route');
    }

    public function index2()
    {
        
        $posts = [
            (object)['title' => '最初の投稿', 'body' => 'これは最初の投稿の本文です。'],
            (object)['title' => '二番目の投稿', 'body' => 'これは二番目の投稿の本文です。'],
            (object)['title' => '三番目の投稿', 'body' => 'これは三番目の投稿の本文です。']
        ];
        return view('posts.index2',['posts' => $posts]);
    }

    public function indexNormalSql()
    {
        $post = new Post();
        $posts = $post->GetPostsWithNormalSql();
        return $posts;
    }
    /**
     * Show the form for creating a new resource.
     */
    /*
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /*
    public function store(Request $request)
    {


        //入力データのバリデーション
        $request->validate([
            'image' => 'required|image',
            'caption' => 'nullable|string|max:255',
        ]);

        //画像の保存
        $path = $request->file('image')->store('images');

        Post::createPost($request->all());

        return response()->json (['message' => '画像が投稿されました！']);
    }

    public function createPostWithNormalSql()
    {
        $dummyData = (object) [
        'user_id' => 1,
        'title' => '素のSQLで新しい投稿',
        'body' => '素のSQLでの新しい投稿の内容です。'
        
        ];
        $post = new Post();
        $post->createPostWithNormalSql($dummyData);
    }

    public function createBulkPostWithNormalSql()
    {
        $post = new Post();
        $post->createBulkPostWithNormalSql();
    }

    public function createPostWithQueryBuilder()
    {
        $dummyData = (object) [
        'user_id' => 1,
        'title' => 'クエリビルダーで新しい投稿',
        'body' => 'クエリビルダーで新しい投稿の内容です。'
        ];
        $post = new Post();
        $post->createPostWithQueryBuilder($dummyData);
    }

    public function getPostWithQueryBuilder()
    {
        $post = new Post();
        $posts = $post->getPostWithQueryBuilder();
        return $posts;
    }

    public function updatePostWithQueryBuilder()
    {
        $dummyData = (object) [
            'id' => 11,
            'title' => '更新された投稿',
            'body' => '更新された投稿の内容です。'
        ];
        $post = new Post();
        $post->updatePostWithQueryBuilder($dummyData);
    }

    public function deletePostWithQueryBuilder()
    {
        $dummyData = (object)[
            'id' => 11,
        ];
        $post = new Post();
        $post->deletePostWithQueryBuilder($dummyData);
    }

    public function getPostWithQueryBuilderByFilter()
    {
        $post = new Post();
        $posts = $post->getPostWithQueryBuilderByFilter();
        return $posts;
    }

    public function getCountPosts()
    {
        $post = new Post();
        $count = $post->getCountPosts();
        return $count;
    }


    public function getPostAndUserWithQueryBuilder()
    {
        $post = new Post();
        $posts = $post->getPostAndUserWithQueryBuilder();
        return $posts;
    }

    public function getPostWithQueryBuilderBYSubQuery()
    {
        $post = new Post();
        $posts = $post->getPostWithQueryBuilderBYSubQuery();
        return $posts;
    }

    public function getPostWithEloquent()
    {
        $post = new Post();
        $posts = $post->getPostWithEloquent();

        //Post::all(); N+1問題
        foreach ($posts as $post) {
            $post->tags;
        }
        return $posts;
    }

    public function getPostWithEloquentById($id)
    {
        $post = new Post();
        $posts = $post->getPostWithEloquentById($id);
        return $posts;
    }

    public function createPostWithEloquent()
    {
        $dummyData = (object)[
            'user_id' => 1,
            'title' => 'Eloquentで新しい投稿',
            'body' => 'Eloquentの新しい投稿の内容です。'
        ];
        $post = new Post();
        $posts = $post->createPostWithEloquent($dummyData);
        return $posts;
    }

    public function updatePostWithEloquent()
    {
        $dummyData = (object)[
            'id' => 28,
            'title' => 'Eloquentで更新された投稿',
            'body' => 'Eloquentで更新された投稿の内容です。'
        ];
        $post = new Post();
        $posts = $post->updatePostWithEloquent($dummyData);
    }

    public function deletePostWithEloquent($id)
    {
        $post = new Post();
        $post->deletePostWithEloquent($id);
    }

    public function getPostWithEloquentTrashed()
    {
        $post = new Post();
        $posts = $post->getTrashPostWithEloquent();
        return $posts;
    }

    public function updatePostWithNormalSql()
    {
        $dummyData = (object)[
            'id' => 18,
            'title' => '更新された投稿',
            'body' => '更新された投稿の内容です。'
        ];
        $post = new Post();
        $post->updatePostWithNormalSql($dummyData);
    }

    public function deletePostWithNormalSql()
    {
        $dummyData = (object) [
            'id' => 12,
        ];
        $post = new Post();
        $post->deletePostWithNormalSql($dummyData);
    }
    /**
     * Display the specified resource.
     */
    /*
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /*
    public function destroy(Post $post)
    {
        //
    }
*/
}
