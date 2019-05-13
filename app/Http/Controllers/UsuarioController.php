<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllUsers(){
        return response()->json(Usuario::all());
    }

    public function getUserById($id){
        return response()->json(Usuario::find($id));
    }

    public function create(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'username' => 'required',
            'correo' => 'required'
        ]);

        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'username' => 'required',
            'correo' => 'required'
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return response()->json($usuario, 200);
    }

    public function delete($id){
        Usuario::findOrFail($id)->delete();
        return response("Deleted success");
    }
}