<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Blog extends Model
{
    use HasFactory;

    public function detail(){
        return $this->hasOne(BlogDetail::class, 'blog_id', 'id');
    }

    public function blog_title(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper($value)
            // set: fn ($value) => $value,
        );
    }
}
