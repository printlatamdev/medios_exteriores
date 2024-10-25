<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Importante
use Spatie\Permission\Traits\HasRoles; // Importante

class User extends Authenticatable
{
    // HasRoles permite implementar todas esas relaciones, en este caso de laravel permission
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    //
    // Por defecto, todos los modelos Eloquent usarán la conexión de base de datos predeterminada
    // configurada para su aplicación. Si desea especificar una conexión diferente para el modelo,
    // use la $connection propiedad:
    protected $connection = 'mysql';

    protected $table = 'users';

    // Eloquent supone que la clave primaria es un valor entero incremental, lo que significa que,
    // por defecto, la clave primaria se convertirá automáticamente en un int.
    protected $primaryKey = 'id';

    // Si desea utilizar una clave primaria no incremental o no numérica,
    // debe establecer la $incrementing propiedad pública en su modelo para false
    // public $incrementing = false;

    // Si su clave principal no es un número entero,
    // debe establecer la $keyTypepropiedad protegida en su modelo para string
    // protected $keyType = 'string';

    // Si no desea que Eloquent administre automáticamente estas columnas,
    // configure la $timestampspropiedad en su modelo para false
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'idpais',
        'sexo',
        'cargo_institucion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
