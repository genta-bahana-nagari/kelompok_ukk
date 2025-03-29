<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table='barang_keluar';

    protected $fillable = ['tgl_keluar', 'qty_keluar', 'phone', 'status'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
