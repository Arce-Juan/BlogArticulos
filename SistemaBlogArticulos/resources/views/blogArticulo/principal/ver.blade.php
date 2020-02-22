@extends ('layouts.admin')
@section ('contenido')

<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

<div class="container">
	<div class="row " style="background-color: #3c8dbc; ">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        	<h1>{{ strtoupper($articulo->titulo) }}</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>{{$articulo->cabecera}}</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="badges">
				Categoria <span class="badge badge-warning">{{$tipoArticulo->nombre}}</span>
				<br>
				Escrito por <span class="badge badge-info">{{$autor->name}}</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			Publicado: 2015-15-15
		</div>
	</div>
	<div class="row justify-content-center align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<img src="{{asset('imagenes/articulos/' . $articulo->imagen)}}" alt="{{$articulo->titulo}}" class="img-thumbnail">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{{$articulo->cuerpo}}
		</div>
	</div>
	<br>
	<hr style="color: #0056b2;" />
	<br>

	<div class="row " style="background-color: #3c8dbc; ">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h5>Comentarios</h5>
		</div>
	</div>

	@foreach ($comentarios as $com)
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="{{asset('imagenes/usuarios/usuario1.jpg')}}" class="card-img"  alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">{{$com->name}}</h5>
						<p class="card-text">{{$com->detalle}}</p>
						<p class="card-text"><small class="text-muted">{{$com->fechaHora}}</small></p>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>
@endsection
