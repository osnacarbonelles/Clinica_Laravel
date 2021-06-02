<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    use HasFactory;

    protected $fillable = ['nombres',"apellidos","direccion","telefono","tipo_sangre","experiencia","fecha_nacimiento","hospital_id"];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Pacientes::class);
    }
}
