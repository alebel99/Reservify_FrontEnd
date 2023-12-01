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

    public function edit($idUsuario){
        $response = Http::get('http://www.reservify.somee.com/api/Usuario/' . $idUsuario);

        if ($response->successful()) {
            $data = $response->json();

            $usuario = $data['response'];
        }

        return view('usuario.usuario_editar', compact('usuario'));
    }

    public function update(Request $request){
        if(empty($request->password)){
            $request->password = "";
        }

        $response = Http::put('http://www.reservify.somee.com/api/Usuario/editarUsuario', [
            'idUsuario' => $request->idUsuario,
            'idNegocio' => $request->idNegocio,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'pass' => $request->password,
            'telefono' => $request->telefono
        ]);

        if($response->successful()){
            return redirect()->route('index_negocios')->with('success', '¡Se editó el usuario con éxito!');
        } else {
            $errorCode = $response->status(); // Código de estado HTTP
            $errorMessage = $response->body(); // Mensaje de error

            return redirect()->route('index_negocios')->with('error', "Error $errorCode: $errorMessage");
        }
    }
}
