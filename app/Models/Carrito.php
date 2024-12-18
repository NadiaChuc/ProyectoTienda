<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillabe = [
        'user_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function carritoproductos(){
        return $this->hasMany(CarritoProducto::class); 
    }

}
