<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcatecory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
