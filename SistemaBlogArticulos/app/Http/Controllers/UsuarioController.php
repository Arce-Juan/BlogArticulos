<?php

namespace blogArticulo\Http\Controllers;

use Illuminate\Http\Request;
use blogArticulo\Http\Requests;
use blogArticulo\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use blogArticulo\User;
use Illuminate\Support\Facades\Auth;
use DB;

class UsuarioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $user = Auth::user();
        if($user == null)
        {
            $userGuest = User::find(7);
            Auth::login($userGuest);
        }
        
        if ($request)
        {
            $query = trim($request->get('searchText'));
            $usuarios = DB::table('users as usu')
                ->join('Perfil as per', 'usu.Perfil_idPerfil', '=', 'per.idPerfil')
                ->select('usu.idUsers', 'usu.name as nickName', 'usu.imagen', 'usu.activo', 'usu.apellido', 'usu.nombre as usu_nombre', 'usu.email', 'per.idPerfil', 'per.nombre as perfil_Nombre')
                ->where('usu.name', 'LIKE', '%'.$query.'%')
                ->orWhere('usu.apellido', 'LIKE', '%'.$query.'%')
                ->orWhere('usu.nombre', 'LIKE', '%'.$query.'%')
                ->orderBy('usu.name', 'asc')
                ->paginate(7);

            $perfiles = DB::table('Perfil')->get();

            return view('blogArticulo.usuario.index', ["usuarios"=>$usuarios, "perfiles"=>$perfiles, "searchText"=>$query]);
        }
    }

    public function verPerfil(Request $request)
    {
        $user = Auth::user();
        if($user == null)
        {
            $userGuest = User::find(7);
            Auth::login($userGuest);
        }
        
        $perfil = DB::table('Perfil as pf')
            ->select('pf.nombre')    
            ->where('pf.idPerfil', '=', auth()->user()->Perfil_idPerfil)
            ->first();
        return view('blogArticulo.usuario.verPerfil', ["perfil"=>$perfil]);
    }

    public function edit($id)
    {
        return view("blogArticulo.usuario.edit");
    }

    public function update(UsuarioFormRequest $request,$id)
    {
        $user = User::findOrFail($id);
        $user->email = $request->get('email');
        if ($request->get('password') != "")
        {
            $user->password = bcrypt($request->get('password'));
        }
        
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path().'imagenes/usuario/', $file->getClientOriginalName());
            $user->imagen = $file->getClientOriginalName();
        }
        $user->update();
        return Redirect::to('blogArticulo/principal');
    }

    public function editarUsuario(UsuarioFormRequest $request)
    {
        print_r('asdfasdfasdf');
        $request->get('nHiddenIdUsuario');
        $user = User::findOrFail($request->get('nHiddenIdUsuario'));
        $user->activo = $request->get('nSelectEstado');
        $user->Perfil_idPerfil = $request->get('nSelectPerfil');
        $user->update();
        return Redirect::to('blogArticulo/usuario');
    }
}
