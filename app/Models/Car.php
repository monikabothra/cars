<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function car_type()
    {
        return $this->belongsTo(Car_type::class, 'type');
    }
    public function car_images()
    {
        return $this->hasMany(Car_image::class);
    }
    public function owners()
    {
        return $this->belongsTo(User::class, 'owner');
    }
}
