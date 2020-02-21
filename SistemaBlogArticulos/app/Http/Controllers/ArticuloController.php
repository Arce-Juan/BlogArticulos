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
            $query = trim($request->get('searchText'));
            
            $articulos = DB::table('Articulo as art')
            ->join('users as usu', 'art.Usuario_idUsuario', '=', 'usu.idUsers')
            ->join('TipoArticulo as ta', 'art.TipoArticulo_idTipoArticulo', '=', 'ta.idTipoArticulo')
            ->select('art.*', 'usu.name as nickName', 'ta.nombre')
            ->where('titulo', 'LIKE', '%'.$query.'%')
            ->where('usu.activo', '=', '1')
            ->orderBy('idArticulo', 'asc')
            ->paginate(7);
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
        $articulo->titulo = 'titulo eliminado ' . $id;
        $articulo->cabecera = 'cabecera eliminado ' . $id;
        $articulo->update();
        return Redirect::to('blogArticulo/articulo');
    }
}
