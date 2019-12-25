<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //此模型没有定义created_at , updated_at字段; 设置timestamps属性为false,不对其进行更新
    public  $timestamps = false;

    protected $fillable = [
    	"name", "description"
    ]
}
