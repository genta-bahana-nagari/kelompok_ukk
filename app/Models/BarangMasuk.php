<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table='barang_masuk';

    protected $fillable = ['tgl_masuk', 'qty_masuk', 'phone', 'status'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
