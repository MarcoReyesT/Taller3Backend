<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ejemplar;

class EjemplarController extends Controller
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
        return Ejemplar::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ejemplar = Ejemplar::create($request->all());
        if (!isset($ejemplar)) { 
            $datos = [
            'errors' => true,
            'msg' => 'Error al crear el ejemplar',
            ];
            $ejemplar = \Response::json($datos, 404);
        }         
        // se retorna a la ruta 
        return $ejemplar;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ejemplar = Ejemplar::find($id);
        if (!isset($ejemplar)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró el ejemplar con ID = ' . $id,
            ];
            $ejemplar = \Response::json($datos, 404);
        }
        return $ejemplar;
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
        $ejemplar = Ejemplar::find($id);
        $ejemplar->fill($request->all());
        $ejemplarRetorno = $ejemplar->save();
        if (isset($ejemplar)) {
            $ejemplar = \Response::json($ejemplarRetorno, 200);
        } else {
           $ejemplar = \Response::json(['error' => 'No se ha podido actualizar el ejemplar'], 404);
        }
        return $ejemplar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejemplar = Ejemplar::find($id);
        if ($ejemplar->delete()) {
            $ejemplar = \Response::json(['delete' => true, 'id' => $id], 200);
        } else {
           $ejemplar = \Response::json(['error' => 'No se ha podido eliminar el ejemplar'], 403);
        }
        return $ejemplar;
    }
}
