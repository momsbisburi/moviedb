<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedItem extends Model
{
    protected $fillable = ['user_id', 'tmdb_id', 'media_type', 'title', 'poster_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
