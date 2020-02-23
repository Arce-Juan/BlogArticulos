<?php

namespace blogArticulo;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'Articulo';
    protected $primaryKey = 'idArticulo';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'cabecera',
        'cuerpo',
        'imagen',
        'TipoArticulo_idTipoArticulo',
        'Usuario_idUsuario',
        'activo',
        'fechaPublicacion',
    ];

    protected $guarded = [

    ];
}
