<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    use HasFactory;

    protected $table='brands';

    public function phone()
    {
        return $this->hasMany(Phone::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
}
