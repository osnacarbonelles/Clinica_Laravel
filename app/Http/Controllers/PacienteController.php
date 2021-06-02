<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = request()->validate([
        //     "nombres" => 'required',
        //     "apellidos" => 'required',
        //     "direccion" => 'required',
        //     "eps" => 'required',
        //     "nombres_acomp" => 'required',
        //     "apellidos_acomp" => 'required',
        //     "telefono_acomp" => 'required',
        //     "diagnostico" => 'required',
        //     "motivo_consulta" => 'required',
        // ]);


        $data = $request->all();



        $paciente = Pacientes::create([
            "doctor_id"           => $data["doctor_id"],
            "nombres"           => $data["nombres"],
            "apellidos"         => $data["apellidos"],
            "direccion"         => $data["direccion"],
            "EPS"               => $data["EPS"],
            "nombres_acomp"     => $data["nombres_acomp"],
            "apellidos_acomp"   => $data["apellidos_acomp"],
            "telefono_acomp"    => $data["telefono_acomp"],
            "antecedentes"    => $data["antecedentes"],
            "diagnostico"       => $data["diagnostico"],
            "motivo_consulta"   => $data["motivo_consulta"],
        ]);

        return redirect("/formulario/covid/" . $paciente->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctores::where("id", $id)->first();
        $pacientes = Pacientes::all();
        return view("pacientes.show", compact("doctor", "pacientes"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function lista_pacientes()
    {
        $pacientes = Pacientes::where("estado", "=", 1)->get();
        return view("pacientes.lista", compact("pacientes"));
    }

    public function formulario_covid($id)
    {
        $paciente = Pacientes::where("id", $id)->first();
        return view("pacientes.covid", compact("paciente"));
    }

    public function deteccion_covid(Request $request)
    {
        $data = $request->all();


        //validacion
        if ($data['Tos'] == null) {
            if (count($data) < 6) {
                return redirect('/formulario/covid/' . $data["paciente_id"])->withErrors([
                    'error' => 'Seleccione dos de posibles sintomas',
                ])->withInput();
            }
        } else if ($data['dificulta_respirar'] == null) {
            if (count($data) < 6) {
                return redirect('/formulario/covid/' . $data["paciente_id"])->withErrors([
                    'error' => 'Seleccione dos de posibles sintomas',
                ])->withInput();
            }
        } else {

            if ($data["Tos"] === "No" && $data["dificulta_respirar"] === "No") {
                return redirect('/formulario/covid/' . $data["paciente_id"])->withErrors([
                    'estado' => 'No es cantidato para covid',
                ])->withInput();
            } else if ($data["Tos"] == "No" || $data["dificulta_respirar"] == "No") {
                if (count($data) < 6) {
                    return redirect('/formulario/covid/' . $data["paciente_id"])->withErrors([
                        'error' => 'Seleccione otro posible sintoma',
                    ])->withInput();
                } else {
                    return redirect('/formulario/covid/' . $data["paciente_id"])->withErrors([
                        'estado' => 'Es posible cantidato para covid',
                    ])->withInput();
                }
            } else {
                return redirect('/formulario/covid/' . $data["paciente_id"])->withErrors([
                    'estado' => 'Es posible cantidato para covid',
                ])->withInput();
            }
        }
        //dd($data);
    }
}
