<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','body','comment_count'];

    public function Comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function Category() {
        return $this->belongsTo('App\Models\Category');
    }
}
