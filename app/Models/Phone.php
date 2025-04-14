<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table='phones';

    protected $fillable = ['image', 'title', 'body', 'stok', 'status', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
