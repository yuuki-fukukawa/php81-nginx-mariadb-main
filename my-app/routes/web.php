<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return 'Hello, World';
});

Route::get('/user/{id}', User::class .
'@getUsersById');
*/

Route::get('/posts',
[PostController::class, 'index']
)->name('posts.index');


Route::get('/post/create',
[PostController::class, 'create']
);

Route::post('/post/create',
[PostController::class, 'store']
)->name('post.store');

Route::get('/post/{post}',
[PostController::class, 'show']
)->name('post.show');

Route::get('/post/edit/{post}',
[PostController::class, 'edit']
)->name('post.edit');

Route::post('/post/update',
[PostController::class, 'update']
)->name('post.update');

Route::delete('/post/delete/{post}',
[PostController::class, 'destroy']
)->name('post.destroy');

/*Route::get('/', function() {
    return Inertia::render('Welcome');
});*/
Route::get('/', [PostController::class, 'index']);
/*
Route::get('/posts/redirect',
[PostController::class, 'indexRedirect']);

Route::get('/posts2',
[PostController::class, 'index2']);

Route::get('/posts3',
[PostController::class, 'indexNormalSql']);

Route::post('/posts',
[PostController::class, 'store']);

Route::prefix('posts')->group(function () {
    Route::get('/create',
    [PostController::class, 'create']);//postsのcreate
    Route::get('/edit',
    [PostController::class, 'edit']);//postsのedit
    Route::get('/show',
    [PostController::class, 'show']);//postsのshow
    Route::get('/delete',
    [PostController::class, 'delete']);//postsのdelete
});

Route::post('/posts/create/bulk',
[PostController::class, 'createBulkPostWithNormalSql']);

Route::post('/posts/create/normalsql',
[PostController::class, 'createPostWithNormalSql']);

Route::post('/posts/update/normalsql',
[PostController::class, 'updatePostWithNormalSql']);

Route::post('/posts/delete/normalsql',
[PostController::class, 'deletePostWithNormalSql']);

Route::post('/posts/create/querybuilder',
[PostController::class, 'createPostWithQueryBuilder']);

Route::get('/posts/show/querybuilder',
[PostController::class, 'getPostWithQueryBuilder']);

Route::post(
    '/posts/update/querybuilder',
    [PostController::class,
    'updatePostWithQueryBuilder']
);

Route::post(
    '/posts/delete/querybuilder',
    [PostController::class,
    'deletePostWithQueryBUilder']
);

Route::get(
    '/posts/show/querybuilder/filter',
    [PostController::class,
    'getPostWithQueryBuilderByFilter']
);

Route::get(
    '/posts/show/querybuilder/count',
    [PostController::Class,
    'getCountPosts']
);

Route::get(
    '/posts/show/querybuilder/join',
    [PostController::Class,
    'getPostAndUserWithQueryBuilder']
);

Route::get(
    '/posts/show/querybuilder/subquery',
    [
        PostController::class,
        'getPostWithQueryBuilderBYSubQuery'
    ]
    );

Route::get(
    '/posts/show/eloquent/',
    [PostController::class,
    'getPostWithEloquent']
);

Route::get(
    '/posts/show/eloquent/{id}',
    [PostController::class,
    'getPostWithEloquentById']
);

Route::get(
    '/posts/trashed',
    [PostController::class,
    'getPostWithEloquentTrashed']
);

Route::post(
    '/posts/create/eloquent',
    [PostController::class,
    'createPostWithEloquent']
);

Route::post(
    '/posts/update/eloquent',
    [PostController::class,
    'updatePostWithEloquent']
);

Route::post(
    '/posts/delete/eloquent/{id}',
    [PostController::class,
    'deletePostWithEloquent']
);
*/