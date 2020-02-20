@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('blogArticulo.articulo.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Cabecera</th>
                        <th>Cuerpo</th>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Escritor</th>
                    </thead>
                   @foreach ($articulos as $art)
                    <tr>
                        <td>{{ $art->idArticulo}}</td>
                        <td>{{ $art->titulo}}</td>
                        <td>{{ $art->cabecera}}</td>
                        <td>{{ $art->cuerpo}}</td>
                        <td>
                            <img src="{{asset('imagenes/articulos/' . $art->imagen)}}" alt="{{$art->titulo}}" height="100px" width="100px" class="img-thumbnail">
                            
                        </td>
                        <td>{{ $art->nombre}}</td>
                        <td>{{ $art->nickName}}</td>
                        <td>
                            <a href="{{URL::action('ArticuloController@edit',$art->idArticulo)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$art->idArticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('blogArticulo.articulo.modal')
                    @endforeach
                </table>
            </div>
            {{$articulos->render()}}
        </div>
    </div>
@endsection
