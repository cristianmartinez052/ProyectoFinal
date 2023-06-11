<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion','caracteristicas', 'tipo', 'precio', 'stock', 'categoria_id', 'marca_id', 'imagen'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function decrementarStock($cantidad){
        $this->decrement('stock',$cantidad);
        $this->update([
            'stock'=>DB::raw("stock - $cantidad"),
        ]);
    }

    
}
