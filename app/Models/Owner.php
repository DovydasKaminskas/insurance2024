<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $timestamps = false;
    protected $fillable=['name', 'surname', 'email', 'address'];
    use HasFactory;

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
