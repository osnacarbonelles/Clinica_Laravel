@extends('layouts.app')
@section('title')
    Hospitales
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center mt-5">
            <div class="card m-4 w-50 bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title text-center">Actualizar Hospital</h5>
                    <form method="POST" action="{{ url("/hospitales/actu/{$hospital->id}") }}">

                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Nombre del hospital" value="{{ $hospital->nombre }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad"
                                    placeholder="Ciudad de localizacion" value="{{ $hospital->ciudad }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Carrera 46 # 11E - 2 sur" value="{{ $hospital->direccion }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-2">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
