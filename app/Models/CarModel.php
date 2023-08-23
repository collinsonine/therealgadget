<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id', 'model', 'color'
    ];

    public function car(){
        return $this->hasOne(Car::class);
    }
}
