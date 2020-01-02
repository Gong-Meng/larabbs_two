<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content'];

    //关联文章
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    //关联用户
   	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
