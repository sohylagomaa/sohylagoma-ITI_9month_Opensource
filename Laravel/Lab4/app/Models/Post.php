<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['title','body', 'user_id', 'image'];

    public function setImageAttribute($value) {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
                
                if (isset($this->attributes['image'])) {
                    Storage::disk('public')->delete($this->attributes['image']);
                }

                $path = $value->store('posts', 'public');
                $this->attributes['image'] = $path;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
