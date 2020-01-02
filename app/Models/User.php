<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class User extends Authenticatable implements  MustVerifyEmailContract
{
    use Notifiable, MustVerifyEmailTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * 用户对应话题，一对多关系
     * [topics description]
     * @return [type] [description]
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    //验证当前用户是否是对应模型用户
    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    //关联回复
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
