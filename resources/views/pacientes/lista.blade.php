@extends('layouts.app')
@section('title')
    Pacientes
@endsection
@section('content')
    <div class="container d-flex justify-content-center">
        <div class=" mt-5">
            <div class="row">
                <div class="col-4">
                    <a href="/lista/doctores" class="link-info h3" style="text-decoration: none">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
                <div class="col-4"></div>
                <div class="col-4">
                    <a href="/hospitales" class="btn btn-info text-white mb-3 " style="float: right;">Volver a
                        hospitales</a>
                </div>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">EPS</th>
                        <th scope="col">Nombre del Acompañante</th>
                        <th scope="col">Telefono de contacto</th>
                        <th scope="col">Antecedentes</th>
                        <th scope="col">Diagnostico</th>
                        <th scope="col">Motivo de la consulta</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pacientes as $paciente)
                        <tr>
                            <th>{{ $paciente->id }}</th>
                            <th>{{ $paciente->nombres }} {{ $paciente->apellidos }}</th>
                            <th>{{ $paciente->direccion }}</th>
                            <th>{{ $paciente->EPS }}</th>
                            <th>{{ $paciente->nombres_acomp }} {{ $paciente->apellidos_acomp }}</th>
                            <th>{{ $paciente->telefono_acomp }}</th>
                            <th>{{ $paciente->antecedentes == null ? 'no tiene antecendentes' : $paciente->antecedentes }}
                            </th>
                            <th>{{ $paciente->diagnostico }}</th>
                            <th>{{ $paciente->motivo_consulta }}</th>
                            <th><a href="/formulario/covid/{{ $paciente->id }}" class="btn btn-primary">Deteccion covid</a>
                            </th>
                        </tr>
                    @empty
                        <p>
                            No hay pacientes registrados.
                        </p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
