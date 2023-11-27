<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function index(){
        session()->forget('usuario');
        session()->forget('negocio');

        return view('login.login');
    }

    public function auth(Request $request){
        $response = Http::get('http://www.reservify.somee.com/api/Usuario/acceder/'.urlencode($request->email) . '/' . urlencode($request->password));

        if ($response->successful()) {
            $data = $response->json();

            $usuario = $data['response'];

            $id = $usuario['idUsuario'];
            $idNegocio = $usuario['idNegocio'];

            session(['usuario' => $id]);
            session(['negocio' => $idNegocio]);

            return redirect()->route('index_negocios');
        } else {
            return redirect()->route('index')->with('error', 'Credenciales inválidas. Por favor, intenta de nuevo.');
        }
    }

    public function create(){
        return view('login.register');
    }

    public function store_user(Request $request){
        $response = Http::post('http://www.reservify.somee.com/api/Usuario/registrarUsuario', [
            'idNegocio' => 0,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo' => $request->email,
            'pass' => $request->password,
            'telefono' => $request->telefono
        ]);

        if($response->successful()){
            return redirect()->route('index')->with('success', '¡Se registró el usuario con éxito!');
        } else {
            return redirect()->route('index')->with('fail', $response->body());
        }
    }












    

    public function store(Request $request){
        $response = Http::post('http://apirest_reservify.test/api/usuarios',[
            'es_propietario' => $request->es_propietario,
            'id_negocio' => $request->id_negocio,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'contrasena' => $request->contrasena,
            'fechanacimiento' => $request->fechanacimiento
        ]);
        return redirect()->route('usuarios.index')->with("success", "¡Usuario creado con éxito!");
    }

    public function show($idUsuario){
        $response = Http::get('http://apirest_reservify.test/api/usuarios/'.$idUsuario);
        $data = $response->json();
        return view('usuarios_show', compact('data'));
    }

    public function update(Request $request){
        $response = Http::put('http://apirest_reservify.test/api/usuarios/'.$request->id, [
            'es_propietario' => $request->es_propietario,
            'id_negocio' => $request->id_negocio,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'contrasena' => $request->contrasena,
            'fechanacimiento' => $request->fechanacimiento
        ]);
        
        return redirect()->route('usuarios.index')->with("successEdit", "¡Usuario editado con éxito!");
    }

    public function destroy($idUsuario){
        $response = Http::delete('http://apirest_reservify.test/api/usuarios/'.$idUsuario);
        return redirect()->route('usuarios.index')->with("successDelete", "¡Usuario eliminado con éxito!");
    }
}
