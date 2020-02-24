@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-12 col-md-8 col-lg-6 col-xl-3">
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Filtrar Por</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    
                </div>
            </div>
            {!!Form::Open(array('url'=>'blogArticulo/principal/buscarPorFiltro','method'=>'POST','autocomplete'=>'off', 'files'=>'false'))!!}
			{{Form::token()}}
                <div class="box-body" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-3">
                                    Fecha
                                </div>
                                <select name="nSelectFecha" class="col-6 custom-select">
                                    <option value="desc">-elija-</option>
                                    <option value="desc">Mas recientes</option>
                                    <option value="asc">Mas antiguos</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    Relevancia
                                </div>
                                <select name="nSelectComentados" id="" class="col-6 custom-select">
                                    <option value="asc">-elija-</option>
                                    <option value="desc">Mas comentados</option>
                                    <option value="desc">Menos comentados</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    Autor
                                </div>
                                <select name="nSelectAutor" id="" class="col-6 custom-select">
                                    <option value="">-elija-</option>
                                    @foreach ($autores as $aut)
                                        <option value="{{ $aut->name }}">{{ $aut->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>

<br>
<div class="row">
    @if (isset($tipoArticulo))
        <div class="col">
            Categoria <span class="badge badge-warning">{{ $tipoArticulo->nombre }}</span>
        </div>
    @endif
</div>
<div class="row">
    <div class="container">
        <div class="row" style="cursor: pointer">
            @if(count($articulos)==0)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    No hay noticias en esta sección
                </div>
            @endif
            @php ($columnas = 1)
            @foreach ($articulos as $art)
                @if ($columnas < 5)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card" onclick="verNoticia({{ $art->idArticulo}});">
                            <img src="{{asset('imagenes/articulos/' . $art->imagen)}}" height="150px" width="150px" class="card-img-top" alt="foto de sacha">
                            <div class="card-body">
                                <div class="badges">
                                    <span class="badge badge-warning">{{ $art->nombre}}</span>
                                    <span class="badge badge-info">{{ $art->name}}</span>
                                    <span class="badge badge-secondary">{{ substr($art->fechaPublicacion, 0, 10)}}</span>
                                </div>
                                <h5 class="card-title">{{ $art->titulo}}</h5>
                                <p class="card-text">{{ $art->cabecera}}</p>
                            </div>
                        </div>
                    </div>
                @else
                    @php ($columnas = 1)
                    </div>
                    <div class="row" style="cursor: pointer">
                @endif
            @endforeach
        </div>
    </div>
</div>
    <script type="text/javascript">
        var verNoticia = function (id) {
            var url = "/blogArticulo/principal/" + id + "/edit";
            $(location).attr('href',url);
        };

    </script>
@endsection
