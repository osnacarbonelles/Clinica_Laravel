@extends('layouts.app')
@section('title')
    Atender Paciente
@endsection
@section('content')

    <div class="container mt-5">
        <a href="/lista/pacientes" class="link-info h3" style="text-decoration: none">
            Lista de Pacientes <i class="bi bi-arrow-right"></i>
        </a>

        <div>
            <div class="row">
                <div class="col-9">
                    <select name="paciente_id" id="paciente_id" class="form-control">
                        <option value="">Seleccione un paciente</option>
                        @forelse ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }} -
                                {{ $paciente->direccion }}</option>
                        @empty
                            <option value="" disabled>No hay pacientes registrados</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" onclick="mostrarFormularioRegistro()">Agregar nuevo paciente</button>
                </div>
            </div>

            <button onclick="cargarFormularioCovid()" id="formulario_covid"
                class="btn btn-info btn-block text-white mt-2">Ir a
                formulario covid
            </button>

        </div>

        <div class="card bg-dark text-white mt-3" id="formulario_registro" style="display: none">
            <div class="card-body">
                <div class="card-title h3 text-center">
                    Registrar Paciente
                </div>
                <form method="POST" action="{{ url('/pacientes') }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion"
                                required>
                        </div>
                        <div class="form-group col-6">
                            <label for="tipo_sangre">EPS</label>
                            <select name="EPS" id="EPS" class="form-control" required>
                                <option value="">Seleccione su EPS</option>
                                <option value="SURA">SURA</option>
                                <option value="COOMEVA">COOMEVA</option>
                                <option value="SUSALUD">SUSALUD</option>
                                <option value="CAFESALUD">CAFESALUD</option>
                                <option value="VIVA1A">VIVA1A</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres del Acompañante</label>
                            <input type="text" class="form-control" id="nombres_acomp" name="nombres_acomp"
                                placeholder="Nombres del acompañante" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos del Acompañante</label>
                            <input type="text" class="form-control" id="apellidos_acomp" name="apellidos_acomp"
                                placeholder="Apellidos del acompañante" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono del acompañante</label>
                        <input type="number" class="form-control" id="telefono_acomp" name="telefono_acomp"
                            placeholder="Telefono de contacto" minlength="5" maxlength="7" required>
                    </div>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                            onclick="tieneAntecedentes()">
                        <label class="form-check-label" for="flexCheckDefault">
                            ¿Tiene Antecedentes?
                        </label>
                    </div>

                    <div class="form-group" id="antecedentes_area" style="display:none">
                        <textarea class="form-control mt-2 mb-2" name="antecedentes" id="antecedentes" cols="30" rows="10"
                            placeholder="Antecedentes Medicos"></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <textarea class="form-control" name="motivo_consulta" id="motivo_consulta" cols="30" rows="10"
                                placeholder="Motivo de la consulta" required></textarea>
                        </div>
                        <div class="form-group col-6">
                            <textarea class="form-control" name="diagnostico" id="diagnostico" cols="30" rows="10"
                                placeholder="Diagnostico Medico" required></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block w-50 mt-3 mb-3">Registrar</button>

                    </div>
                </form>
            </div>
        </div>

        <script>
            function tieneAntecedentes() {
                let antecentes = document.getElementById("flexCheckDefault");
                let info_antecedentes = document.getElementById("antecedentes_area");
                if (antecentes.checked === true) {
                    info_antecedentes.style.display = "block";
                } else {
                    info_antecedentes.style.display = "none";
                }
            }

            function cargarFormularioCovid() {
                let sel = document.getElementById("paciente_id");
                if (sel.value !== '') {
                    window.location.href = `/formulario/covid/${sel.value}`;
                } else {
                    alert("seleccione un paciente");
                }
            }

            function mostrarFormularioRegistro() {
                let formulario = document.getElementById("formulario_registro");
                let sel = document.getElementById("paciente_id");
                let btn_formulario_covid = document.getElementById("formulario_covid");
                if (formulario.style.display === "none") {
                    formulario.style.display = "block";
                    sel.disabled = true;
                    btn_formulario_covid.disabled = true;
                } else {
                    formulario.style.display = "none";
                    sel.disabled = false;
                    btn_formulario_covid.disabled = false;
                }
            }

        </script>

    @endsection
