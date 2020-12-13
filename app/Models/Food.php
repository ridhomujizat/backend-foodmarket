<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'price',
        'rate',
        'types',
        'picturePath',
    ];

    public function getCreatedAttribute($value)
    {
        return Carboon::parse($value)->tampstamp;
    }
    public function getUpdateAttribute($value)
    {
        return Carboon::parse($value)->tampstamp;
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicurePathAttribute()
    {
        return url('') . storage::url($this->attribute['picturePath']);
    }
}
