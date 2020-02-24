<?php

namespace blogArticulo\Http\Controllers;

use Illuminate\Http\Request;
use blogArticulo\Http\Requests;
use blogArticulo\Articulo;
use blogArticulo\Comentario;
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
            $autores = DB::table('users as usu')
                ->join('Articulo as art', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->select('usu.*')
                ->orderBy('usu.name', 'asc')
                ->distinct()
                ->get();
            $articulos = DB::table('Articulo as art')
                ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
                ->select('art.*', 'usu.name', 'ta.nombre')
                ->where('art.activo', '=', '1')
                ->orderBy('idArticulo', 'asc')
                ->get();
                //->paginate(7);
            return view('blogArticulo.principal.index', ["articulos"=>$articulos, "autores"=>$autores]);
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
            ->where('art.activo', '=', '1')
            ->orderBy('idArticulo', 'asc')
            ->paginate(7);
        return view('blogArticulo.principal', ["articulos"=>$articulos]);
    }


    public function buscarTipo($id)
    {
        $autores = DB::table('users as usu')
            ->join('Articulo as art', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
            ->select('usu.*')
            ->orderBy('usu.name', 'asc')
            ->distinct()
            ->get();
        
        $tipoArticulo = DB::table('TipoArticulo as tipoArt')
            ->where('tipoArt.idTipoArticulo', '=', $id)
            ->first();

        $articulos = DB::table('Articulo as art')
            ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
            ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
            ->select('art.*', 'usu.name', 'ta.nombre')
            ->where('ta.idTipoArticulo', '=', $id)
            ->where('art.activo', '=', '1')
            ->orderBy('idArticulo', 'asc')
            ->paginate(7);
        return view('blogArticulo.principal.index', ["articulos"=>$articulos, "tipoArticulo"=>$tipoArticulo, "autores"=>$autores]);
    }

    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);

        $autor = Usuario::findOrFail($articulo->Usuario_idUsuario);

        $tipoArticulo = TipoArticulo::findOrFail($articulo->TipoArticulo_idTipoArticulo);
        
        $comentarios = DB::table('Comentario as com')
            ->join('users as usu', 'com.Usuario_idUsuario', '=', 'usu.idUsers')
            ->select('com.*', 'usu.name', 'usu.imagen')
            ->where('com.Articulo_idArticulo', '=', $id)
            ->orderBy('com.idComentario', 'desc')
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

    public function guardarComentario(PrincipalFormRequest $request)
    {
        $fechaHoy = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");

        $comentario = new Comentario();
        $comentario->detalle = $request->get('comentario');
        $comentario->fechaHora = $fechaHoy;
        $comentario->Usuario_idUsuario = auth()->user()->idUsers;
        $comentario->Articulo_idArticulo = $request->get('idArticulo');
        $comentario->save();
        return Redirect::to('blogArticulo/principal/' . $request->get('idArticulo') . '/edit');
    }

    public function buscarPorFiltro(Request $request)
    {
        $autores = DB::table('users as usu')
        ->join('Articulo as art', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
        ->select('usu.*')
        ->orderBy('usu.name', 'asc')
        ->distinct()
        ->get();

        $articulos = DB::table('Articulo as art')
            ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
            ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
            ->leftJoin('Comentario as com', 'art.idArticulo', '=', 'com.Articulo_idArticulo')
            ->select('art.*', 'usu.name', 'ta.nombre', DB::raw("count(com.idComentario) as cantidadComentarios"))
            ->where('art.activo', '=', '1')
            ->where('usu.name', 'LIKE', '%'. $request->get('nSelectAutor') .'%')
            ->groupBy('art.idArticulo', 'usu.name', 'ta.nombre')
            ->orderBy('cantidadComentarios', $request->get('nSelectComentados'))
            ->orderBy('art.fechaPublicacion', $request->get('nSelectFecha'))
            //->orderBy('art.idArticulo', 'desc')
            ->paginate(7);
        return view('blogArticulo.principal.index', ["articulos"=>$articulos, "autores"=>$autores]);
    }

}
