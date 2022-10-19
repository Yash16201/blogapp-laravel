<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
