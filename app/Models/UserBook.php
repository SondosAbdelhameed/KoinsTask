<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory;

    protected $table = "user_books";

    public function book() {
        $this->belongsTo(Book::class,'book_id', 'id');
    }
}
