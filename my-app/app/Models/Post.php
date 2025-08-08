<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createPost($data): Post
    {
        //サンプルのためユーザーIDは固定
        $user_id = 1;

        $post = new Post;
        $post->user_id = $user_id;
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();
        return $post;
    }

    public function updatePost($data, $id): Post
    {
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();
        return $post;
    }

    public function deletePost($id): Post
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return $post;
    }

    /*
    public function createPost($data)
    {
        $post = new Post;
        $post->title = $data->title;
        $post->content = $data->content;
        $post->save();
        return $post;
    }

    public function GetPostsWithNormalSql()
    {
        $posts = DB::select('SELECT * FROM posts');
        dd($posts);
        return $posts;
    }

    public function createPostWithNormalSql($data)
    {
        $post = DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [$data->user_id, $data->title, $data->body]);

        return $post;
    }

    public function updatePostWithNormalSql($data)
    {
        $post = DB::update('UPDATE posts SET title = ?, body = ?, updated_at = ? WHERE id = ?', [$data->title, $data->body, $data->id,]);

        return $post;
    }

    public function deletePostWithNormalSql($data)
    {
        //$post DB::table('posts')->where('id', $data->id)->delete();
        $post = DB::delete('DELETE FROM posts WHERE id = ?', [$data->id]);
        return $post;
    }

    public function createBulkPostWithNormalSql()
    {
        DB::transaction(function () {
            $user_id = "1";
            $title = "3番目トランザクションテスト";
            $body = "3番目これはトランザクションのテストです。";

            DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [$user_id, $title, $body]);


            //user_idを入れない
            $title = "4番目のトランザクションテスト";
            $body = "4番目のこれはトランザクションのテストです。";

            DB::insert('INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)', [$user_id,  $title, $body]);
        });
    }

    public function createPostWithQueryBuilder($data)
    {
        $post = DB::table('posts')->insert([
            'user_id' => $data->user_id,
            'title' => $data->title,
            'body'  => $data->body,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return $post;
    }

    public function getPostWithQueryBuilder()
    {
        $posts = DB::table('posts')->get();
        dd($posts);
        return $posts;
    }

    public function updatePostWithQueryBuilder($data)
    {
        $post = DB::table('posts')->where('id', $data->id)->update([
            'title' => $data->title,
            'body' => $data->body,
            'updated_at' => now()
        ]);
        return $post;
    }

    public function deletePostWithQueryBuilder($data)
    {
        $post = DB::table('posts')->where('id', $data->id)->delete();
        return $post;
    }

    public function getPostWithQueryBuilderByFilter()
    {
        //$posts = DB::table('posts')
        //->where('body', 'like', '%内容%')
        //->whereIn('id', [1, 2, 3])
        //->orderBy('created_at', 'desc')
        //->get();

        //ページネーション
        $posts = DB::table('posts')->paginate
        (5);

        return $posts;
    }

    public function getCountPosts()
    {
        $count = DB::table('posts')->count();
        return $count;
    }


    public function getPostAndUserWithQueryBuilder()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->get();
            return $posts;
    }

    public function getPostWithQueryBuilderBYSubQuery()
    {
        $posts = 
        DB::table('posts')
        ->whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
            ->from('posts')
            ->groupBy('user_id');
        })
        ->get();
        return $posts;
    }


    public function getPostWithEloquent()
    {
        $posts = Post::all();
        //$posts = Post::with('tag')->get();
        return $posts;
    }

    public function getPostWithEloquentById($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function getTrashPostWithEloquent()
    {
        $posts = Post::onlyTrashed()->get();//ソフトデリートされたデータを取得
        //$posts = Post::withTrashed()->get();すべてのデータを取得
        return $posts;
    }

    public function createPostWithEloquent($data)
    {
        $post = new Post;
        $post->user_id = $data->user_id;
        $post->title = $data->title;
        $post->body = $data->body;
        $post->save();
        return $post;
    }

    public function updatePostWithEloquent($data)
    {
        $post = Post::find($data->id);
        $post->title = $data->title;
        $post->body = $data->body;
        $post->save();
        return $post;

    }

    public function deletePostWithEloquent(int $id)
    {
        $post = Post::find($id);
        $post->delete();
        return $post;
    }
    
*/

}
