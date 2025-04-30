<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table='barang_keluar';

    protected $fillable = ['phone_id', 'qty_keluar'];

    public function brand()
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

}
