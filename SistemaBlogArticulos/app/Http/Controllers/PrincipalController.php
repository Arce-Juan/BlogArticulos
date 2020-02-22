<?php

namespace blogArticulo\Http\Controllers;

use Illuminate\Http\Request;

use blogArticulo\Http\Requests;
use blogArticulo\Articulo;
use blogArticulo\Usuario;
use blogArticulo\TipoArticulo;
use blogArticulo\Http\Requests\PrincipalFormRequest;
use blogArticulo\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
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
            //$query = trim($request->get('searchText'));
            
            $articulos = DB::table('Articulo as art')
                ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
                ->select('art.*', 'usu.name', 'ta.nombre')
                //->where('titulo', 'LIKE', '%'.$query.'%')
                ->where('usu.activo', '=', '1')
                ->orderBy('idArticulo', 'asc')
                ->paginate(7);
            //return view('blogArticulo.principal.index', ["articulos"=>$articulos, "searchText"=>$query]);
            return view('blogArticulo.principal.index', ["articulos"=>$articulos]);
        }
    }

    public function invitado()
    {
        $user = Usuario::findOrFail(7);
        Auth::login($user);
        $articulos = DB::table('Articulo as art')
            ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
            ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
            ->select('art.*', 'usu.name', 'ta.nombre')
            //->where('titulo', 'LIKE', '%'.$query.'%')
            ->where('usu.activo', '=', '1')
            ->orderBy('idArticulo', 'asc')
            ->paginate(7);
        return view('blogArticulo.principal', ["articulos"=>$articulos]);
    }


    public function buscarTipo($id)
    {
        //if($id)
        //{
            $articulos = DB::table('Articulo as art')
                ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
                ->select('art.*', 'usu.name', 'ta.nombre')
                //->where('titulo', 'LIKE', '%'.$query.'%')
                ->where('ta.idTipoArticulo', '=', $id)
                ->orderBy('idArticulo', 'asc')
                ->paginate(7);
            return view('blogArticulo.principal.index', ["articulos"=>$articulos]);
        //}
    }

    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);

        $autor = Usuario::findOrFail($articulo->Usuario_idUsuario);

        $tipoArticulo = TipoArticulo::findOrFail($articulo->TipoArticulo_idTipoArticulo);
        
        $comentarios = DB::table('Comentario as com')
            ->join('users as usu', 'com.Usuario_idUsuario', '=', 'usu.idUsers')
            ->select('com.*', 'usu.name')
            ->where('com.Articulo_idArticulo', '=', $id)
            ->get();
        return view("blogArticulo.principal.ver", ["articulo" => $articulo, "autor" => $autor ,"comentarios" => $comentarios, "tipoArticulo" => $tipoArticulo]);
    }
    
    public function buscar($id){
        return view::make('blogArticulo.principal.ver');
    }
    public function show()
    {
        //return view("blogArticulo.articulo");
    }

    /*
    public function showDirectReferal()
    {
        return view('blogArticulo/principal/buscar');
        //}
        //else return redirect('errors/404');
    }
    */
}
