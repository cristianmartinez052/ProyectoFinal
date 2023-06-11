<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pedido;
use App\Models\Producto;

class detallePedido extends Model
{
    use HasFactory;
    protected $fillable = ['precio','cantidad','importe','producto_id','pedido_id',];

    
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }

    
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}
