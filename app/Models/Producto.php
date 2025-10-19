<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_productos';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_Product',
        'Descripcion',
        'Stock_Product',
        'Codigo_Product',
        'Valor_Product',
        'imagen',
        'imagen_url',
        'Tipos_Productos_id_Tipos_Productos',
    ];

    public function tipoProducto(): BelongsTo
    {
        return $this->belongsTo(TipoProducto::class, 'Tipos_Productos_id_Tipos_Productos', 'id_Tipos_Productos');
    }
}
