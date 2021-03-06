<?php

namespace blogArticulo;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'idUsers';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'password',
        'imagen',
        'activo',
        'apellido',
        'nombre',
        'email',
        'Perfil_idPerfil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
