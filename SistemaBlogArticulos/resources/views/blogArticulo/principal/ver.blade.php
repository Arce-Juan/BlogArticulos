@extends ('layouts.admin')
@section ('contenido')

<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

<style type="text/css">
	.img-center {display:flex;
  margin:0 auto;}

}
</style>

<div class="container">
	<div class="row " style="background-color: #3c8dbc; ">
		<div class="col-12">
        	<h1>{{ strtoupper($articulo->titulo) }}</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
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
	<div class="row">
		<div class="col-12 justify-content-center img-center">
			<img src="{{asset('imagenes/articulos/' . $articulo->imagen)}}" alt="{{$articulo->titulo}}" class="img-fluid">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			{{$articulo->cuerpo}}
		</div>
	</div>
	
	<hr style="color: #0056b2;" />
	

	<div class="row " style="background-color: #3c8dbc; ">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h5>Comentarios</h5>
		</div>
	</div>

	<?php
	$permisos = DB::table('Permiso as pm')
	  ->join('Perfil as pf', 'pm.Perfil_idPerfil', '=', 'pf.idPerfil')
	  ->join('users as usu', 'pf.idPerfil', '=', 'usu.Perfil_idPerfil')
	  ->select('pm.idPermiso', 'pm.nombre as nomPer')
	  ->where('usu.idUsers', '=', auth()->user()->idUsers)
	  ->get();
	
	$listPermisos = array();
	foreach ($permisos as $per) {
	  array_push($listPermisos, $per->nomPer);
	}
	?>

	{!!Form::open(array('url'=>'blogArticulo/principal/guardarComentario','method'=>'POST','autocomplete'=>'off', 'files'=>'false'))!!}
	{{Form::token()}}
	<div class="card mb-3" style="max-width: 540px;">
		<div class="row no-gutters">
			<div class="col-md-3 text-center">
				<br>
				<img src="{{asset('imagenes/usuarios/' . auth()->user()->imagen)}}" class="img-fluid"  alt="...">
			</div>
			<div class="col-md-9">
				<div class="card-body">
					<div class="row">
						<h5 class="card-title">{{auth()->user()->name}}</h5>
					</div>
					@if (in_array("crearComentario", $listPermisos))
						<div class="row mb-1">
							<textarea name="comentario" id="comentario" rows="2" style="min-width: 100%" placeholder="Escribe un comentario .."></textarea>
							<input type="hidden" name="idArticulo" id="idArticulo" value="{{$articulo->idArticulo}}">
						</div>
						<div class="row d-flex flex-row-reverse bd-highlight">
							<button type="submit" class="btn btn-info">Comentar</button>
						</div>
					@else
						<div class="row mb-1">
							<textarea rows="2" style="min-width: 100%" placeholder="Escribe un comentario .." disabled readonly></textarea>
						</div>
						<div class="row">
							<p>Para poder comentar debes <a href="/logout" >Ingresar / Registrarte</a></p>
						</div>
					@endif

				</div>
				
			</div>
		</div>
	</div>
	{!!Form::close()!!}
	<hr style="color: #0056b2;" />
	@foreach ($comentarios as $com)
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-3 text-center">
					<br>
					<img src="{{asset('imagenes/usuarios/' . $com->imagen)}}" class="img-fluid"  alt="...">
				</div>
				<div class="col-md-9">
					<div class="card-body">
						<h5 class="card-title">{{$com->name}}</h5>
						<p class="card-text">{{$com->detalle}}</p>
						<p class="card-text"><small class="text-muted">{{$com->fechaHora}}</small></p>
					</div>
				</div>
			</div>
		</div>
		
	@endforeach
	
		<hr style="color: #0056b2;" />
	
</div>
@endsection
