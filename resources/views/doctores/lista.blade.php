@extends('layouts.app')
@section('title')
    Doctores
@endsection
@section('content')
    <div class="container d-flex justify-content-center">
        <div class=" mt-5">

            <a href="/doctores" class="link-info h3" style="text-decoration: none">
                Registrar Doctor<i class="bi bi-arrow-right"></i>
            </a>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono de contacto</th>
                        <th scope="col">Tipo de sangre</th>
                        <th scope="col">Años de experiencia</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctores as $doctor)
                        <tr>
                            <th>{{ $doctor->id }}</th>
                            <td>{{ $doctor->nombres }} {{ $doctor->apellidos }}</td>
                            <td style="text-overflow">{{ $doctor->direccion }}</td>
                            <td>{{ $doctor->telefono }}</td>
                            <td>{{ $doctor->tipo_sangre }}</td>
                            <td>{{ $doctor->experiencia }}</td>
                            <td>{{ $doctor->fecha_nacimiento }}</td>
                            <td>
                                <a href="/atender/paciente/{{ $doctor->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Atender Paciente" style="text-decoration: none">
                                    <i class="bi bi-person-circle text-primary"
                                        style="font-size : 20px; margin-right : 10%"></i>
                                </a>

                                <a href="/editar/doctor/{{ $doctor->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Editar Doctor" style="text-decoration: none">
                                    <i class="bi bi-pencil-square text-info"
                                        style="font-size : 20px; margin-right : 10%"></i>
                                </a>
                                <a href="/eliminar/doctor/{{ $doctor->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Eliminar Doctor" style="text-decoration: none">
                                    <i class="bi bi-person-x text-danger" style="font-size : 20px"></i>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <p>
                            No hay doctores registrados.
                        </p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
