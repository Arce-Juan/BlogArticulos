@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::open(array('url'=>'blogArticulo/articulo','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="titulo">Titulo</label>
            	<input type="text" name="titulo" class="form-control" placeholder="Titulo...">
            </div>
            <div class="form-group">
            	<label for="cabecera">Cabecera</label>
            	<input type="text" name="cabecera" class="form-control" placeholder="Cabecera...">
            </div>
            <div class="form-group">
            	<label for="cuerpo">Cuerpo</label>
            	<input type="text" name="cuerpo" class="form-control" placeholder="Cuerpo...">
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
			</div>
			<div class="form-group">
            	<label for="idTipoArticulo"></label>
				<select name="idTipoArticulo" class="form-control">
					@foreach ($tiposArticulos as $item)
						<option value="{{$item->idTipoArticulo}}">{{$item->nombre}}</option>
					@endforeach
				</select>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}

		</div>
	</div>
@endsection
