<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use App\Models\Hospital;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitales = Hospital::all();
        return view('doctores.index', compact("hospitales"));
    }

    public function lista()
    {
        $doctores = Doctores::where("estado", "=", 1)->get();
        return view("doctores.lista", compact("doctores"));
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
        $data = $request->all();
        Doctores::create([
            "hospital_id" => $data["hospital_id"],
            "nombres" => $data["nombres"],
            "apellidos" => $data["apellidos"],
            "direccion" => $data["direccion"],
            "telefono" => $data["telefono"],
            "experiencia" => $data["experiencia"],
            "fecha_nacimiento" => $data["fecha_nacimiento"],
            "tipo_sangre" => $data["grupo_sangre"] . "" . $data["tipo_sangre"],
        ]);
        return redirect("/lista/doctores");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctores::where("id", $id)->first();
        return view("doctores.edit", compact("doctor"));
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
        $data = request()->validate([
            'nombres' => 'required',
            "apellidos" => 'required',
            "direccion" => 'required',
            "telefono" => 'required',
            "experiencia" => 'required',
            "fecha_nacimiento" => 'required',
            "tipo_sangre" => 'required',
        ]);

        $doctor = Doctores::where("id", $id)->first();
        $doctor->update($data);
        return redirect("/lista/doctores");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctores::find($id);
        $doctor->estado = 0;
        $doctor->update();
        return redirect("/lista/doctores");
    }
}
