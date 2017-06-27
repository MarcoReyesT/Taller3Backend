<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Autor;

class AutorController extends Controller
{

    // Constructor
    public function __construct()
    {   
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Autor::all();
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
        $autor = Autor::find($id);
        if (!isset($autor)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró el autor con ID = ' . $id,
            ];
            $autor = \Response::json($datos, 404);
        }
        return $autor;
    }

}
