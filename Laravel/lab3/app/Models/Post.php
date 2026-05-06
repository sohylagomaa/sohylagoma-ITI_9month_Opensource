<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 

class Post extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'description', 'user_id'];

    public function sluggable(): array {
        return ['slug' => ['source' => 'title']];
    }

    public function user() { return $this->belongsTo(User::class); }

    public function comments() { return $this->hasMany(Comment::class); }

}
