<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = []; // Izinkan semua kolom diisi

    public function bird(): BelongsTo
    {
        return $this->belongsTo(Bird::class);
    }
}