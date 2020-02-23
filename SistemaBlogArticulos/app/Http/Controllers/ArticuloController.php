<?php

namespace blogArticulo\Http\Controllers;

use Illuminate\Http\Request;
use blogArticulo\Http\Requests;
use blogArticulo\Articulo;
use blogArticulo\Http\Requests\ArticuloFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            //obtenemos los permisos. si es admin q muestre todo. si es escritor, solo que muestre los suyos.
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

            if (in_array("gestionArticuloPersonal", $listPermisos))
            {
                $query = trim($request->get('searchText'));
                $articulos = DB::table('Articulo as art')
                ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
                ->select('art.*', 'usu.name as nickName', 'ta.nombre')
                ->where('titulo', 'LIKE', '%'.$query.'%')
                ->where('art.activo', '=', '1')
                ->where('usu.idUsers', '=', auth()->user()->idUsers )
                ->orderBy('idArticulo', 'asc')
                ->paginate(7);
            }
            else
            {
                $query = trim($request->get('searchText'));
                $articulos = DB::table('Articulo as art')
                ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
                ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
                ->select('art.*', 'usu.name as nickName', 'ta.nombre')
                ->where('titulo', 'LIKE', '%'.$query.'%')
                //->where('art.activo', '=', '1')
                ->orderBy('idArticulo', 'asc')
                ->paginate(7);
            }

            
            return view('blogArticulo.articulo.index', ["articulos"=>$articulos, "searchText"=>$query]);
        }
    }

    public function create()
    {
        $tiposArticulo = DB::table('TipoArticulo')->get();
        return view("blogArticulo.articulo.create", ["tiposArticulos" => $tiposArticulo ]);
    }

    public function store(ArticuloFormRequest $request)
    {
        $fechaHoy = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");

        $articulo = new Articulo();
        $articulo->titulo = $request->get('titulo');
        $articulo->cabecera = $request->get('cabecera');
        $articulo->cuerpo = $request->get('cuerpo');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path().'imagenes/articulos/', $file->getClientOriginalName());
            $articulo->imagen = $file->getClientOriginalName();
        }
        $articulo->TipoArticulo_idTipoArticulo = $request->get('idTipoArticulo');
        $articulo->Usuario_idUsuario = auth()->user()->idUsers;
        $articulo->fechaPublicacion = $fechaHoy;
        $articulo->activo = 1;
        $articulo->save();
        return Redirect::to('blogArticulo/articulo');
    }

    public function show($id)
    {
        return view("blogArticulo.articulo.show", ["articulo"=>Articulo::findOrFail($id)]);
    }

    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $tiposArticulo = DB::table('TipoArticulo')->get();
        return view("blogArticulo.articulo.edit", ["articulo" => $articulo, "tiposArticulos" => $tiposArticulo]);
    }

    public function update(ArticuloFormRequest $request,$id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->titulo = $request->get('titulo');
        $articulo->cabecera = $request->get('cabecera');
        $articulo->cuerpo = $request->get('cuerpo');
        $articulo->TipoArticulo_idTipoArticulo = $request->get('idTipoArticulo');
        $articulo->imagen = $request->get('imagen');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path().'imagenes/articulos/', $file->getClientOriginalName());
            $articulo->imagen = $file->getClientOriginalName();
        }
        $articulo->Usuario_idUsuario = auth()->user()->idUsers;
        $articulo->update();
        return Redirect::to('blogArticulo/articulo');
    }

    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->activo = 0;
        $articulo->update();
        return Redirect::to('blogArticulo/articulo');
    }
    
    public function restore($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->activo = 1;
        $articulo->update();
        return Redirect::to('blogArticulo/articulo');
    }
}
