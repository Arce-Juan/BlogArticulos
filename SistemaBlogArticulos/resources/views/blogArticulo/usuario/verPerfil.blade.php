@extends('layouts.admin')
@section('contenido')

<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<style media="screen">
        #uploadForm,
        #imagePreview{
            
            margin: 0 auto;
        }
    
        img {
            max-width: 250px;
            height: auto;
        }
    </style>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Edita tu perfil de usuario</h3>

            <div id="idDivAlertasDarger">
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
    </div>
    <div class="container">
    <div class="row">
        <div class="col-11">
            <div class="panel-body">
                <form method="POST" onsubmit="return validarPassword();" action="http://localhost:8000/blogArticulo/usuario/{{auth()->user()->idUsers}}" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{Form::token()}}
                    <input type="hidden" name="_token" value="FBZEXXGc1ESSJCeCRQNgYDMsdahz78JVZtUYZjdI">
                    
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-md-3 control-label">Usuario</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{auth()->user()->name}}" disabled readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="nombre" class="col-md-3 control-label">Perfil</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{$perfil->nombre}}" disabled readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="apellido" class="col-md-3 control-label">Apellidos</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{auth()->user()->apellido}}" disabled readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="nombre" class="col-md-3 control-label">Nombres</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{auth()->user()->nombre}}" disabled readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="apellido" class="col-md-3 control-label">E-Mail</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="apellido" class="col-md-3 control-label">Contraseña</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="nombre" class="col-md-3 control-label">Confirmar Contraseña</label>
                                    <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <label for="imagen" class="col-md-3 control-label">Imagen</label>
                                    <div class="col-md-9">
                                        <input type="file" name="imagen" id="miImagen" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <div id="imagePreview">
                                        <img src="{{asset('imagenes/usuarios/' . auth()->user()->imagen)}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>  Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        (function(){
					function filePreview(input){
						if(input.files && input.files[0]){
							var reader = new FileReader();
							reader.onload = function(e){
								$('#imagePreview').html("<img src='" + e.target.result + "' />");
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
					$('#miImagen').change(function(){
						filePreview(this);
					});
        })();

        var validarPassword = function() {
            $('#idDivAlertasDarger').html("");
            if ($('#password').val() != $('#password-confirm').val()) {
                $('#idDivAlertasDarger').html("<div class='alert alert-danger'><ul><li>Las contraseña no es igual a la de confirmación</li></ul></div>");
                return false;
            }
        };
    </script>

@endsection
