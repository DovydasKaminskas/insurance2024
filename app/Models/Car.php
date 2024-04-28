<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['reg_number', 'brand', 'model', 'owner_id', 'image_file', 'image_name'];

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
}
