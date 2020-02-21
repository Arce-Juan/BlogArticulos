<?php

namespace blogArticulo;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'idUsers';
    public $timestamps = false;
    protected $fillable = [
        'nickName',
        'contrasena',
        'imagen',
        'activo',
        'apellido',
        'nombre',
        'Perfil_idPerfil',
    ];

    protected $guarded = [

    ];
}
