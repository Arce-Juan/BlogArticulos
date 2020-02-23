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
            $articulos = DB::table('Articulo as art')
                ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
                ->select('art.*', 'usu.name', 'ta.nombre')
                ->where('art.activo', '=', '1')
                ->orderBy('idArticulo', 'asc')
                ->paginate(7);
            return view('blogArticulo.usuario.index', ["articulos"=>$articulos]);
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
        /*
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path().'imagenes/articulos/', $file->getClientOriginalName());
            $articulo->imagen = $file->getClientOriginalName();
        }
        */
        $user->update();
        return Redirect::to('blogArticulo/principal');
    }
}
