<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;

class UsuarioController extends Controller
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
        return Usuario::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        if (!isset($usuario)) { 
            $datos = [
            'errors' => true,
            'msg' => 'Error al crear al usuario',
            ];
            $usuario = \Response::json($datos, 404);
        }         
        // se retorna a la ruta 
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (!isset($usuario)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró al usuario con ID = ' . $id,
            ];
            $usuario = \Response::json($datos, 404);
        }
        return $usuario;
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
        $usuario = Usuario::find($id);
        $usuario->fill($request->all());
        $usuarioRetorno = $usuario->save();
        if (isset($usuario)) {
            $usuario = \Response::json($usuarioRetorno, 200);
        } else {
           $usuario = \Response::json(['error' => 'No se ha podido actualizar al usuario'], 404);
        }
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario->delete()) {
            $usuario = \Response::json(['delete' => true, 'id' => $id], 200);
        } else {
           $usuario = \Response::json(['error' => 'No se ha podido eliminar al usuario'], 403);
        }
        return $usuario;
    }
}
