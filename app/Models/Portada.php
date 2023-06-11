<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Portada extends Model
{
    use HasFactory;
    protected $fillable = ['producto_id','titulo','imagen'];

    public function producto(): BelongsTo{
        return $this->belongsTo(Producto::class);
    }
}
