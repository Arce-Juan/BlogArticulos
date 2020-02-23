<?php

namespace blogArticulo\Http\Controllers;

use blogArticulo\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $permisos = DB::table('Permiso as pm')
            ->join('Perfil as pf', 'pm.Perfil_idPerfil', '=', 'pf.idPerfil')
            ->join('users as usu', 'pf.idPerfil', '=', 'usu.Perfil_idPerfil')
            ->select('pm.idPermiso', 'pm.nombre as nomPer')
            ->where('usu.idUsers', '=', auth()->user()->idUsers)
            ->get();
              
            echo 'colega3'; 
            $listPermisos = array();
        foreach ($permisos as $per) {
            array_push($listPermisos, $per->nomPer);
        }
        Session::put('session_ListaPermisos', array(1,2,3,4));
        */
        return view('home');
    }
}
