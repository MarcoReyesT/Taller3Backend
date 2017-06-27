<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libro;

class LibroController extends Controller
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
        return Libro::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = Libro::create($request->all());
        if (!isset($libro)) { 
            $datos = [
            'errors' => true,
            'msg' => 'Error al crear el libro',
            ];
            $libro = \Response::json($datos, 404);
        }         
        // se retorna a la ruta 
        return $libro;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);
        if (!isset($libro)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró el libro con ID = ' . $id,
            ];
            $libro = \Response::json($datos, 404);
        }
        return $libro;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        $libro->fill($request->all());
        $libroRetorno = $libro->save();
        if (isset($libro)) {
            $libro = \Response::json($libroRetorno, 200);
        } else {
           $libro = \Response::json(['error' => 'No se ha podido actualizar el libro'], 404);
        }
        return $libro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        if ($libro->delete()) {
            $libro = \Response::json(['delete' => true, 'id' => $id], 200);
        } else {
           $libro = \Response::json(['error' => 'No se ha podido eliminar el libro'], 403);
        }
        return $libro;
    }
}
