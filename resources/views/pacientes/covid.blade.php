@extends('layouts.app')
@section('title')
    Atender Paciente
@endsection
@section('content')

    <div class="container">
        <div class="mt-5">
            <a href="/hospitales" class="link-info h3" style="text-decoration: none">
                <i class="bi bi-arrow-left"></i> Volver al inicio
            </a>
        </div>
        <div class="card bg-dark text-white">
            <div class="card-body">
                <div class="card-title h3 text-center">
                    Formulario deteccion de covid
                </div>
                <form method="POST" action="{{ url('/deteccion/covid') }}">
                    @csrf
                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="tos">¿Tiene tos?</label>
                            <select name="Tos" id="tos" class="form-control" required>
                                <option value="">Seleccion su opcion</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="dificulta_respirar">¿Dificultad para respirar ? (sentir que le falta el
                                aire)</label>
                            <select name="dificulta_respirar" id="dificulta_respirar" class="form-control" required>
                                <option value="">Seleccion su opcion</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row m-5">
                        <span class="h4 text-center mt-2">Otros posibles sintomas:</span>
                        <div class="form-check mt-2 col-6">
                            <input class="form-check-input" name="checkFiebre" type="checkbox" value="no tiene fiebre"
                                id="checkFiebre" onclick="validarFiebre()">
                            <label class="form-check-label" for="checkFiebre">
                                ¿Fiebre?
                            </label>
                        </div>

                        <div class="form-check mt-2 col-6">
                            <input class="form-check-input" name="checkEscalofrios" type="checkbox"
                                value="no tiene escalofrios" id="checkEscalofrios" onclick="validarEscalofríos()">
                            <label class="form-check-label" for="checkEscalofrios">
                                ¿Escalofríos?
                            </label>
                        </div>

                        <div class="form-check mt-2 col-6">
                            <input class="form-check-input" name="checkTemblores" type="checkbox" value="no tiene temblores"
                                id="checkTemblores" onclick="validarTemblores()">
                            <label class="form-check-label" for="checkTemblores">
                                ¿Temblores y escalofríos que no ceden?
                            </label>
                        </div>

                        <div class="form-check mt-2 col-6">
                            <input class="form-check-input" name="checkDolorMuscular" type="checkbox"
                                value="no tiene dolor muscular" id="checkDolorMuscular" onclick="validarDolor()">
                            <label class="form-check-label" for="checkDolorMuscular">
                                ¿Dolor muscular?
                            </label>
                        </div>
                    </div>

                    <div class="text-center">
                        <span class="text-danger h5">
                            @if ($errors->has('error'))
                                {{ $errors->first('error') }}
                            @endif
                        </span>
                        <span class="text-success h5">
                            @if ($errors->has('estado'))
                                {{ $errors->first('estado') }}
                            @endif
                        </span>

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block w-50 mt-3 mb-3">Detectar</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function validarFiebre() {
                let fiebre = document.getElementById("checkFiebre");
                if (fiebre.checked) {
                    fiebre.value = "tiene fiebre";
                } else {
                    fiebre.value = "no tiene fiebre";
                }
            }

            function validarEscalofríos() {
                let escalofrios = document.getElementById("checkEscalofrios");
                if (escalofrios.checked) {
                    escalofrios.value = "tiene escalofrios";
                } else {
                    escalofrios.value = "no tiene escalofrios";
                }
            }

            function validarTemblores() {
                let temblores = document.getElementById("checkTemblores");
                if (temblores.checked) {
                    temblores.value = "tiene temblores";
                } else {
                    temblores.value = "no tiene temblores";
                }
            }

            function validarDolor() {
                let dolor = document.getElementById("checkDolorMuscular");
                if (dolor.checked) {
                    dolor.value = "tiene dolor muscular";
                } else {
                    dolor.value = "no tiene dolor muscular";
                }
            }

        </script>

    @endsection
