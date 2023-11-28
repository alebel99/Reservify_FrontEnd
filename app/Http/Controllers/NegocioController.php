<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class NegocioController extends Controller
{
    public function index(){
        $response = Http::get('http://www.reservify.somee.com/api/Negocio');
        
        if($response->successful()){
            $data = $response->json();

            if ($data['mensaje'] === 'okay' && isset($data['response'])) {
                $negocios = $data['response'];
            }
        } else {
            echo "La solicitud falló con un código de estado: " . $response->status();
        }

        return view('home', compact('negocios'));
    }

    public function show($idNegocio){
        $response = Http::get('http://www.reservify.somee.com/api/Negocio/negocioDetalle/'.$idNegocio);

        if($response->successful()){
            $data = $response->json();

            if ($data['mensaje'] === 'okay' && isset($data['response'])) {
                $negocio = $data['response'];
            }
        } else {
            echo "La solicitud falló con un código de estado: " . $response->status();
        }

        return view('negocios.negocio_detalle', compact('negocio'));
    }

    public function negocio_citas($idNegocio){
        $response = Http::get('http://www.reservify.somee.com/api/Citas/GetCitasNegocio/'.$idNegocio);

        if($response->successful()){
            $citas = $response->json();
        } else {
            echo "La solicitud falló con un código de estado: " . $response->status();
        }

        return view('negocios.negocio_citas', compact('citas'));
    }

    public function eliminar_cita($id_cita, $idNegocio){
        $response = Http::delete('http://www.reservify.somee.com/api/Citas/'.$id_cita);

        return redirect()->route('citas_negocio', $idNegocio)->with('successDelete','¡Se eliminó la cita con éxito!');
    }

    public function create(){
        return view('negocios.negocio_crear');
    }

    public function store(Request $request){
        $nombreArchivo = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('imagenes'), $nombreArchivo);
    
        $response = Http::attach(
            'foto',
            file_get_contents(public_path('imagenes') . '/' . $nombreArchivo),
            $nombreArchivo
        )->post('http://www.reservify.somee.com/api/Negocio/crearNegocio', [
            'idUsuario' => $request->idUsuario,
            'categoria' => $request->categoria,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'horaApertura' => date('G', strtotime($request->horaApertura)),
            'horaCierre' => date('G', strtotime($request->horaCierre)),
            'descripcion' => $request->descripcion,
        ]);
    
        $data = $response->json();
        $idNegocio = $data['idNegocio'];
    
        session(['idNegocio' => $idNegocio]);
    
        return redirect()->route('index_negocios')->with('success','¡Se creó tu negocio con éxito!');
    }

    public function edit($idNegocio){
        
    }




    public function update(Request $request){
        $response = Http::put('http://127.0.0.1:8000/api/negocios/'.$request->id, [
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'horaapertura' => $request->horaapertura,
            'horacierre' => $request->horacierre,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('negocios.index')->with("successEdit", "¡Negocio editado con éxito!");
    }
}
