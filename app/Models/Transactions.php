<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory, Softdelates;

    protected $fillable = [
        'food_id',
        'user_id',
        'quantity',
        'total',
        'status',
        'payment_url',
    ];

    public function food()
    {
        return $this->hashOne(Food::class, 'id', 'food_id');
    }

    public function user()
    {
        return $this->hashOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAttribute($value)
    {
        return Carboon::parse($value)->tampstamp;
    }
    public function getUpdateAttribute($value)
    {
        return Carboon::parse($value)->tampstamp;
    }
}
