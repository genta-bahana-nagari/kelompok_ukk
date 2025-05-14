<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';

    protected $fillable = ['order_date', 'total', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->items?->sum(function ($item) {
                return optional($item->phone)->harga * $item->total;
            }) ?? 0,
        );
    }
}
