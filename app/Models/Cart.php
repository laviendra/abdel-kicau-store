<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bird_id',
        'quantity',
    ];

    /**
     * Mendefinisikan bahwa setiap item keranjang "milik" satu Burung.
     * Ini adalah "jembatan" yang hilang itu.
     */
    public function bird()
    {
        return $this->belongsTo(Bird::class);
    }
}