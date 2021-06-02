@extends('layouts.app')
@section('title')
    Hospitales
@endsection
@section('content')
    <div class="container-fluid">

        @forelse ($hospitales as $hospital)

            <div class="p-5 text-white bg-dark rounded-3 m-5">
                <h1 class="display-4">Hospital: {{ $hospital->nombre }}</h1>
                <p class="lead">{{ $hospital->id == 1 ? 'Hospital generado por seeder' : '' }}</p>
                <p><strong>Direccion</strong>: {{ $hospital->direccion }}</p>
                <p><strong>Ciudad</strong>: {{ $hospital->ciudad }}</p>
                {{-- <a href="/doctores/{{ $hospital->id }}" class="btn btn-primary btn-lg" role="button">Ir a doctores</a> --}}
                <a href="/lista/doctores" class="btn btn-primary btn-lg" role="button">Ir a doctores</a>
                <a href="/hospitales/{{ $hospital->id }}" class="btn btn-success btn-lg" role="button">Editar Hospital</a>
                <a href="/hospitales/eliminar/{{ $hospital->id }}" class="btn btn-danger btn-lg" role="button">Eliminar
                    Hospital</a>
            </div>

        @empty
            <div class="d-flex justify-content-center mt-5">
                <div class="card m-4 w-50 bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrar Hospital</h5>
                        <form method="POST" action="{{ url('/hospitales') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre del hospital" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                                        placeholder="Ciudad de localizacion" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Carrera 46 # 11E - 2 sur" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-2">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
@endsection
