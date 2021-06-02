<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitales = Hospital::where("estado", "=", 1)->get();
        return view('hospitales.index', compact("hospitales"));
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

        if (empty($data['nombre'])) {
            return redirect('/hospitales')->withErrors([
                'nombre' => 'el Campo nombre del hospital es obligatorio',
            ])->withInput();
        }

        if (empty($data['direccion'])) {
            return redirect('/hospitales')->withErrors([
                'direccion' => 'el Campo direccion del hospital es obligatorio'
            ])->withInput();
        }

        if (empty($data['ciudad'])) {
            return redirect('/hospitales')->withErrors([
                'ciudad' => 'el Campo ciudad del hospital es obligatorio'
            ])->withInput();
        }

        $hospital = Hospital::create([
            'nombre' => $data["nombre"],
            'direccion' => $data["direccion"],
            'ciudad' => $data["ciudad"],
        ]);

        return redirect('/hospitales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("show hospital");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::where("id", $id)->first();
        return view("hospitales.edit", compact("hospital"));
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
        $data = $request->all();
        $hospital = Hospital::where("id", $id)->first();
        $hospital->update($data);
        return redirect("/hospitales");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        //$hospital->estado = 0;
        //$hospital->update();
        $hospital->delete();
        return redirect("/hospitales");
    }
}
