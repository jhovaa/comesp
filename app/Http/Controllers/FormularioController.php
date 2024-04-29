<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\PDF;

class FormularioController extends Controller
{
    public function saveForm(Request $request){
        try {
            // Validar los datos del formulario
            $validatedData = $request->validate([
                //validacion hoja de ruta unica
                //'hoja_ruta' => [
                //    'required',
                    // Rule::unique('formularios')->ignore($request->id)
                //],
                //validacion datos solicitante
                'aerodromo' => 'required',
                'solicitante' => 'required',
                'ci' => 'required',
                'correo' => 'required',
                'telefono' => 'required',
                'departamento' => 'required',
                'municipio' => 'required',
                //validación para las coordenadas
                'designador_umbral_menor' => 'required',
                'coord_latitud_sur_8_1_grados' => 'required',
                'coord_latitud_sur_8_1_minutos' => 'required',
                'coord_latitud_sur_8_1_segundos' => 'required',
                'coord_longitud_oeste_8_2_grados' => 'required',
                'coord_longitud_oeste_8_2_minutos' => 'required',
                'coord_longitud_oeste_8_2_segundos' => 'required',
                'designador_umbral_mayor' => 'required',
                'coord_latitud_sur_9_1_grados' => 'required',
                'coord_latitud_sur_9_1_minutos' => 'required',
                'coord_latitud_sur_9_1_segundos' => 'required',
                'coord_longitud_oeste_9_2_grados' => 'required',
                'coord_longitud_oeste_9_2_minutos' => 'required',
                'coord_longitud_oeste_9_2_segundos' => 'required',
                'elevacion_arp' => 'required',
                'coord_latitud_sur_10_1_grados' => 'required',
                'coord_latitud_sur_10_1_minutos' => 'required',
                'coord_latitud_sur_10_1_segundos' => 'required',
                'coord_longitud_oeste_10_2_grados' => 'required',
                'coord_longitud_oeste_10_2_minutos' => 'required',
                'coord_longitud_oeste_10_2_segundos' => 'required',
            ]);

            // Crear un nuevo objeto Formulario y asignar los valores
            $formulario = new Formulario();
            //asignacion de valores de hoja ruta
            //$formulario->hoja_ruta = $validatedData['hoja_ruta'];
            $formulario->hoja_ruta = isset($validatedData['hoja_ruta']) ? $validatedData['hoja_ruta'] : '';
            //asignacion de valores de datos de solicitante
            $formulario->nombre_aerodromo = $validatedData['aerodromo'];
            $formulario->nombre_solicitante = $validatedData['solicitante'];
            $formulario->ci = $validatedData['ci'];
            $formulario->correo_electronico = $validatedData['correo'];
            $formulario->telefono = $validatedData['telefono'];
            $formulario->departamento = $validatedData['departamento'];
            $formulario->municipio = $validatedData['municipio'];
            //asignacion de valores de coordenadas
            $formulario->designador_umbral_menor_elevacion = $validatedData['designador_umbral_menor'];
            $formulario->du_menor_latitud_sur_grados = $validatedData['coord_latitud_sur_8_1_grados'];
            $formulario->du_menor_latitud_sur_minutos = $validatedData['coord_latitud_sur_8_1_minutos'];
            $formulario->du_menor_latitud_sur_segundos = $validatedData['coord_latitud_sur_8_1_segundos'];
            $formulario->du_menor_longitud_oeste_grados = $validatedData['coord_longitud_oeste_8_2_grados'];
            $formulario->du_menor_longitud_oeste_minutos = $validatedData['coord_longitud_oeste_8_2_minutos'];
            $formulario->du_menor_longitud_oeste_segundos = $validatedData['coord_longitud_oeste_8_2_segundos'];
            $formulario->designador_umbral_mayor_elevacion = $validatedData['designador_umbral_mayor'];
            $formulario->du_mayor_latitud_sur_grados = $validatedData['coord_latitud_sur_9_1_grados'];
            $formulario->du_mayor_latitud_sur_minutos = $validatedData['coord_latitud_sur_9_1_minutos'];
            $formulario->du_mayor_latitud_sur_segundos = $validatedData['coord_latitud_sur_9_1_segundos'];
            $formulario->du_mayor_longitud_oeste_grados = $validatedData['coord_longitud_oeste_9_2_grados'];
            $formulario->du_mayor_longitud_oeste_minutos = $validatedData['coord_longitud_oeste_9_2_minutos'];
            $formulario->du_mayor_longitud_oeste_segundos = $validatedData['coord_longitud_oeste_9_2_segundos'];
            $formulario->elevacion_aerodromo = $validatedData['elevacion_arp'];
            $formulario->ea_latitud_sur_grados = $validatedData['coord_latitud_sur_10_1_grados'];
            $formulario->ea_latitud_sur_minutos = $validatedData['coord_latitud_sur_10_1_minutos'];
            $formulario->ea_latitud_sur_segundos = $validatedData['coord_latitud_sur_10_1_segundos'];
            $formulario->ea_longitud_oeste_grados = $validatedData['coord_longitud_oeste_10_2_grados'];
            $formulario->ea_longitud_oeste_minutos = $validatedData['coord_longitud_oeste_10_2_minutos'];
            $formulario->ea_longitud_oeste_segundos = $validatedData['coord_longitud_oeste_10_2_segundos'];
            // Guardar el formulario en la base de datos
            $formulario->save();
            // Devolver una respuesta
            return response()->json(['message' => 'Formulario guardado correctamente', 'formulario_id' => $formulario->id], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }

    public function verPDF($id)
    {
        // Recuperar los datos según el ID, esto dependerá de tu lógica de negocio
        $datos = Formulario::find($id);

        // Crear una vista con los datos recuperados
        $vista = view('formulario.vistaPDF', compact('datos'))->render();

        // Generar el PDF
        $pdf = PDF::loadHTML($vista);

        // Mostrar el PDF en el navegador
        return $pdf->stream('archivo.pdf');
    }

    public function reporte()
    {
        // $formularios = Formulario::all();
        $formularios = Formulario::orderByDesc('id')->get();
        return view('formulario.reporte', compact('formularios'));
    }
}
