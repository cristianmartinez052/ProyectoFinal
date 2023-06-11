<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'total',
        'impuesto',
        'baseImponible',
        'fechapedido',
        'estado',
        'user_id',
    ];

    
    public function detallePedido(): HasMany
    {
        return $this->hasMany(detallePedido::class);
    }

  
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function updateStock($producto_id,$cantidad){
        $producto = new Producto();
        $producto = Producto::find($producto_id);
        $producto->decrementarStock($cantidad);
    } 
}
