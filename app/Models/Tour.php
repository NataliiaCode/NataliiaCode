<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        // 'image',
        'price',
        'category_id',
    ];


    public $timestamps = false;


    function category()
    {
        return $this->belongsTo(Category::class);
    }


    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => 'hello'
    //     );
    // }

    public function getImageAttribute($value)
    {
        return $value ? $value : '/images/nophoto.png';
    }

    public function getShortDescriptionAttribute($value)
    {
        // return 'hello';
        // return $this->attributes['description'];
        // return $value ? $value : $this->description;
        return Str::words($this->attributes['description'], 1, '...');
    }
}
