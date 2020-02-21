<?php

namespace blogArticulo;

use Illuminate\Database\Eloquent\Model;

class TipoArticulo extends Model
{
    protected $table = 'TipoArticulo';
    protected $primaryKey = 'idTipoArticulo';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];

    protected $guarded = [

    ];
}
