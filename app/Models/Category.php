<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'category_name'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');//hasOne(class,foreign_key,local_key)
    }
}
