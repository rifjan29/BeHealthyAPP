<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Category';

    public function type()
    {
        return $this->belongsTo(Type::class);
        // return $this->hasMany(Type::class);
    }
}
