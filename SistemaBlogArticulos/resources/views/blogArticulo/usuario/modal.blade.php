<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-update-{{$usu->idUsers}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title">Usuario: <b>{{ $usu->nickName . " - " . $usu->apellido . ", " . $usu->usu_nombre }} </b></h4>
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
			</div>
			{!!Form::Open(array('url'=>'blogArticulo/usuario/editarUsuario','method'=>'POST','autocomplete'=>'off', 'files'=>'false'))!!}
			{{Form::token()}}
				<div class="modal-body">
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Activo</label>
						<div class="col-sm-3">
							<select name="nSelectEstado" class="custom-select">
								@if ($usu->activo == 1)
									<option value="1" selected>SI</option>
									<option value="0">NO</option>
								@else
									<option value="1">SI</option>
									<option value="0" selected>NO</option>
								@endif
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Perfil</label>
						<div class="col-sm-5">
						<select name="nSelectPerfil" class="custom-select">
							@foreach ($perfiles as $per)
								<option value="{{ $per->idPerfil }}"
									@if ( $per->idPerfil == $usu->idPerfil )
										selected
									@endif
									>{{ $per->nombre }}
								</option>
							@endforeach
						</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="nHiddenIdUsuario" value="{{ $usu->idUsers }}">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button onclick="window.location.href = '/blogArticulo/articulo/actualizarUsuario/{{$usu->idUsers}}'" class="btn btn-primary">Actualizar</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>

	

</div>
