<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class CitaController extends Controller
{
    public function index($idNegocio){
        $response = Http::get('http://www.reservify.somee.com/api/Negocio/negocioDetalle/'.$idNegocio);

        if($response->successful()){
            $data = $response->json();

            if ($data['mensaje'] === 'okay' && isset($data['response'])) {
                $negocio = $data['response'];
            }
        } else {
            echo "La solicitud falló con un código de estado: " . $response->status();
        }

        return view('citas.agendar_cita', compact('negocio'));
    }

    public function store(Request $request){
        $response = Http::post('http://www.reservify.somee.com/api/Citas', [
            'fecha' => Carbon::createFromFormat('Y-m-d', $request->fecha)->format('d/m/Y'),
            'hora' => Carbon::createFromFormat('H:i', $request->hora)->format('H:i'),
            'id_negocio' => $request->idNegocio,
            'id_usuario' => $request->idUsuario,
        ]);

        return redirect()->route('index_negocios')->with('success', '¡Tu cita se agendó con éxito!');
    }

    public function ver_citas_usuario($idUsuario){
        $response = Http::get('http://www.reservify.somee.com/api/Citas/GetCitasUsuario/'.$idUsuario);

        if($response->successful()){
            $citas = $response->json();
        } else {
            echo "La solicitud falló con un código de estado: " . $response->status();
        }

        return view('citas.ver_citas_usuario', compact('citas'));
    }

    public function editar_cita($idCita){
        $response = Http::get('http://www.reservify.somee.com/api/Citas/'.$idCita);

        $cita = $response->json();

        $cita['fecha'] = Carbon::createFromFormat('d/m/Y', $cita['fecha'])->format('Y-m-d');
        $cita['hora'] = Carbon::createFromFormat('H:i', $cita['hora'])->format('H:i');

        $response2 = Http::get('http://www.reservify.somee.com/api/Negocio/negocioDetalle/'.$cita['id_negocio']);

        if($response2->successful()){
            $data = $response2->json();

            if ($data['mensaje'] === 'okay' && isset($data['response'])) {
                $negocio = $data['response'];
            }
        } else {
            echo "La solicitud falló con un código de estado: " . $response->status();
        }

        return view('citas.editar_cita', compact('cita'), compact('negocio'));
    }

    public function update(Request $request){
        $response = Http::put('http://www.reservify.somee.com/api/Citas/'.$request->id,[
            'id' => $request->id,
            'fecha' => Carbon::createFromFormat('Y-m-d', $request->fecha)->format('d/m/Y'),
            'hora' => Carbon::createFromFormat('H:i', $request->hora)->format('H:i'),
            'id_negocio' => $request->idNegocio,
            'id_usuario' => $request->idUsuario,
        ]);

        return redirect()->route('ver_citas_usuario', $request->idUsuario)->with('successEdit','¡Se editó la cita con éxito!');
    }

    public function destroy($idCita, $idUsuario){
        $response = Http::delete('http://www.reservify.somee.com/api/Citas/'.$idCita);

        return redirect()->route('ver_citas_usuario', $idUsuario)->with('successDelete','¡Se eliminó la cita con éxito!');
    }

}
