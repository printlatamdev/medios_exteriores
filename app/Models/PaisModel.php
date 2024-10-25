<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaisModel extends Model
{
    use HasFactory; 
    
    # Por defecto, todos los modelos Eloquent usarán la conexión de base de datos predeterminada
    # configurada para su aplicación. Si desea especificar una conexión diferente para el modelo,
    # use la $connection propiedad:
    protected $connection = 'mysql';
    
    protected $table = 'pais';
    
    # Eloquent supone que la clave primaria es un valor entero incremental, lo que significa que,
    # por defecto, la clave primaria se convertirá automáticamente en un int.
    protected $primaryKey = 'id';
    
    # Si desea utilizar una clave primaria no incremental o no numérica,
    # debe establecer la $incrementing propiedad pública en su modelo para false
    # public $incrementing = false;
    
    # Si su clave principal no es un número entero,
    # debe establecer la $keyTypepropiedad protegida en su modelo para string
    # protected $keyType = 'string';
    
    # Si no desea que Eloquent administre automáticamente estas columnas,
    # configure la $timestampspropiedad en su modelo para false
    public $timestamps = false;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
     'nombre',
     'area',
    ];

}
