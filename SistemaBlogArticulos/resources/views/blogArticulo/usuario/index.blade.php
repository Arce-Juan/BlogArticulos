@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Gestion de Usuarios </h3>
            @include('blogArticulo.usuario.search')
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-10">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nick Name</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Apellido nombre</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">-</th>
                    </thead>
                    @foreach ($usuarios as $usu)
                    <tr>
                        <td>{{ $usu->idUsers}}</td>
                        <td>{{ $usu->nickName}}</td>
                        <td>
                            <img src="{{asset('imagenes/usuarios/' . $usu->imagen)}}" alt="{{$usu->imagen}}" height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td>
                            @if ($usu->activo == 1)
                                SI
                            @else
                                NO
                            @endif
                        </td>
                        <td>{{ $usu->apellido . ", " . $usu->usu_nombre }}</td>
                        <td>{{ $usu->email}}</td>
                        <td>{{ $usu->perfil_Nombre}}</td>
                        <td style="width: 110px;">
                            <a class="btn btn-primary" href="" data-target="#modal-update-{{$usu->idUsers}}" data-toggle="modal" title="Actualizar"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                    @include('blogArticulo.usuario.modal')
                    @endforeach
                </table>
            </div>
            {{$usuarios->render()}}
        </div>
    </div>
@endsection
