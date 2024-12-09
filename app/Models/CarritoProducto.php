<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarritoProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad',
    ];

    // Relación con Producto
    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
