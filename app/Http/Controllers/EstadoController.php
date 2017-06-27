<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estado;

class EstadoController extends Controller
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
        return Estado::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function store(PeliculaRequest  $request)
    {
        //
    }
    */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $estado = Estado::find($id);
        if (!isset($estado)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró el estado con ID = ' . $id,
            ];
            $estado = \Response::json($datos, 404);
        }
        return $estado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function update(Request $request, $id)
    {
        //
    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function destroy($id)
    {
        //
    }
    */
}
