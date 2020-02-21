@extends('layouts.admin')
@section('contenido')
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
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="card" onclick="verNoticia({{ $art->idArticulo}});">
                            <img src="{{asset('imagenes/articulos/' . $art->imagen)}}" height="150px" width="150px" class="card-img-top" alt="foto de sacha">
                            <div class="card-body">
                                <div class="badges">
                                    <span class="badge badge-warning">{{ $art->nombre}}</span>
                                    <span class="badge badge-info">{{ $art->name}}</span>
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
    <script type="text/javascript">
        var verNoticia = function (id) {
            var url = "/blogArticulo/principal/" + id + "/edit";
            $(location).attr('href',url);
            //var url = "principal/showDirectReferal";
            //$(location).attr('href',url);
            /*
            $.ajax({
                type:"method",
                url:"principal/buscar",
                data:{
                },
                success:function (data) {
                },error:function(jqXHR, textStatus, errorThrown){
                    console.log('error del coso este:: '+ errorThrown);
                }

            });
            */
            /*
            $.post('principal/55/edit', { }, function (data) {

            });
            */
            /*
            $.ajax({
                data: {},
                url: "principal/buscar",
                method: "POST",
                success: function(data) {
                    
                }
            });
            */
            //window.location="{{URL::to('blogArticulo/principal/buscar')}}";
        };

    </script>
@endsection
