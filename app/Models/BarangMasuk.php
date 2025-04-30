<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table='barang_masuk';

    protected $fillable = ['phone_id', 'qty_masuk'];

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope('orderByDate', function ($query) {
            $query->orderBy('created_at', 'desc')
                  ->orderBy('updated_at', 'desc');
        });
    }

    // public function getImageUrlAttribute()
    // {
    //     return asset('storage/' . $this->image);
    // }
}
