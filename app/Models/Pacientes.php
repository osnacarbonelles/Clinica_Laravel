<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombres",
        "apellidos",
        "direccion",
        "EPS",
        "nombres_acomp",
        "apellidos_acomp",
        "telefono_acomp",
        "antecedentes",
        "motivo_consulta",
        "diagnostico",
        "doctor_id"
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctores::class);
    }
}
