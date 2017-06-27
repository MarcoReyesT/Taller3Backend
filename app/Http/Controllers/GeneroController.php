<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Genero;

use Redirect;
use Session;

class GeneroController extends Controller
{

    // Constructor
    public function __construct()
    {   
        //
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Genero::all();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $genero = Genero::find($id);
        if (!isset($genero)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró el genero con ID = ' . $id,
            ];
            $genero = \Response::json($datos, 404);
        }
        return $genero;
    }

}
