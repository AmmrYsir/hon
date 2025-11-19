<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'author_id',
        'price',
        'rent_price',
        'type',
        'status',
        'cover_image',
        'file_path',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
