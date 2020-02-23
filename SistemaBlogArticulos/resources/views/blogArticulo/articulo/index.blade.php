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
                        <th scope="col">Titulo</th>
                        <th scope="col">Cabecera</th>
                        <th scope="col" class="d-none d-lg-block">Cuerpo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Escritor</th>
                        <th scope="col">-</th>
                    </thead>
                   @foreach ($articulos as $art)
                    <tr>
                        <td style="width: 110px;">{{substr($art->titulo, 0, 25) . '..'}}</td>
                        <td style="width: 110px;">{{substr($art->cabecera, 0, 25) . '..'}}</td>
                        <td class="d-none d-lg-block">{{$art->cuerpo}}</td>
                        <td>
                            <img src="{{asset('imagenes/articulos/' . $art->imagen)}}" alt="{{$art->titulo}}" height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td>{{ $art->nombre}}</td>
                        <td>{{ $art->nickName}}</td>
                        <td style="width: 110px;">
                            <a class="btn btn-info" href="{{URL::action('ArticuloController@edit',$art->idArticulo)}}" role="button" title="Editar"><i class="fa fa-pencil"></i></a>
                            @if($art->activo == 1)
                                <a class="btn btn-danger" href="" data-target="#modal-delete-{{$art->idArticulo}}" data-toggle="modal" title="Eliminar"><i class="fa fa-trash"></i></a>
                            @else
                                <a class="btn btn-secondary" href="" data-target="#modal-restore-{{$art->idArticulo}}" data-toggle="modal" title="Restablecer"><i class="fa fa-upload"></i></a>
                            @endif
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
