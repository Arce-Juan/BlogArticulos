<?php

namespace blogArticulo;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'Comentario';
    protected $primaryKey = 'idComentario';
    public $timestamps = false;
    protected $fillable = [
        'detalle',
        'fechaHora',
        'Usuario_idUsuario',
        'Articulo_idArticulo',
    ];

    protected $guarded = [

    ];
}
