<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoProducto extends Model
{
    protected $table = 'tipos_productos';
    protected $primaryKey = 'id_Tipos_Productos';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_Categoria',
        'Descripcion',
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'Tipos_Productos_id_Tipos_Productos', 'id_Tipos_Productos');
    }
}
