<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','category_id','image_id','body','title','comment_count'];

    public function Comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function Image() {
        return $this->belongsTo('App\Models\Image');
    }
    public function User() {
        return $this->belongsTo('App\Models\User');
    }
    public function Category() {
        return $this->belongsTo('App\Models\Category');
    }
}
