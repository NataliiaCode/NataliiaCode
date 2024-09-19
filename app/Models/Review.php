<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'comment',
        'rating',
        'user_id',
        'tour_id'

    ];


    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
