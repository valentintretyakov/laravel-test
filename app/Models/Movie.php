<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    const IS_PUBLISHED = 1;
    const NOT_PUBLISHED = 0;

    protected $fillable = ['name', 'poster'];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
}
