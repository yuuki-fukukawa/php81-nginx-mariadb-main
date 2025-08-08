<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //テーブル名を指定（省略可能）
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAllUsers()
    {
        $users = User::all();
        return $users;
    }

    public function getUsersById($id)
    {
        $user = User::find($id);
        dd($user->posts);
        return $user;
    }

    public function createUser($data)
    {
        $user = new User;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->save();//データベースに保存
        return $user;
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->save();
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}

