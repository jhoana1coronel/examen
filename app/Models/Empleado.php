<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Empleado extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'empleados';
    protected $fillable = [
        'nombre',
            'telefono',
            'edad',
            'genero',
            'carrera',
            'ednia_indigena',
            'horario' ,
            'calificacion_prepa',
            'becado' ,
            'problemas_de_salud'
    ];
    use HasFactory;
}
