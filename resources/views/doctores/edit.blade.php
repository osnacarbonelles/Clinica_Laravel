@extends('layouts.app')
@section('title')
    Doctores
@endsection
@section('content')
    <div class="container mt-5">
        <a href="/lista/doctores" class="link-info h3" style="text-decoration: none">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
        <div class="card bg-dark text-white">
            <div class="card-body">
                <div class="card-title h3 text-center">
                    Actualizar Doctor
                </div>
                <form class="m-4" method="POST" action="{{ url("/actualizar/doctor/{$doctor->id}") }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres"
                                value="{{ $doctor->nombres }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos"
                                value="{{ $doctor->apellidos }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion"
                            value="{{ $doctor->direccion }}" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono"
                                placeholder="Telefono de contacto" value="{{ $doctor->telefono }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="experiencia">Años de experiencia</label>
                            <input type="number" class="form-control" id="experiencia" name="experiencia"
                                placeholder="Años de experiencia" value="{{ $doctor->experiencia }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="fecha_nacimiento">
                                Fecha de Nacimiento
                            </label>
                            <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                value="{{ $doctor->fecha_nacimiento }}" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="tipo_sangre">Tipo de sangre</label>
                            <select id="tipo_sangre" name="tipo_sangre" class="form-control" required>

                                <option selected value="{{ $doctor->tipo_sangre }}">{{ $doctor->tipo_sangre }}</option>
                                <option value="">Elija su tipo de sangre</option>
                                <option value="A">+A</option>
                                <option value="A">-A</option>
                                <option value="B">+B</option>
                                <option value="B">-B</option>
                                <option value="AB">+AB</option>
                                <option value="AB">-AB</option>
                                <option value="O">+O</option>
                                <option value="O">-O</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block w-50 mt-3">Actualizar</button>
                        <div>
                </form>

            </div>
        </div>
    </div>
@endsection
