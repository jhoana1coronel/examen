<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
            $empleados = Empleado::all();
            return response([
                'total_data' => count($empleados),
                'data' => $empleados
            ]);
    }

    public function estadisticas (Request $Request)
    {

        $masculino =  Empleado::where("genero","Masculino")->get();
        $femenino =  Empleado::where("genero","Femenino")->get();
        $problemas = Empleado::where("problemas_de_salud", "si")->get();
        $nproblemas = Empleado::where("problemas_de_salud", "no")->get();
        $becado = Empleado::where("becado", "si")->get();
        $nbecado = Empleado::where("becado", "no")->get();
        $mat = Empleado::where("horario", "matutino")->get();
        $vesp = Empleado::where("horario", "vespertino")->get();
        $aprobados = Empleado::where("calificacion_de_prepa", ">=", 7)->get();
        $reprobados = Empleado::where("calificacion_de_prepa", "<=", 6)->get();


        return response([
            'mesage'=> 'cuantos hay en la BD',
            '¿Cuantos masculinos hay?'=>count($masculino),
            '¿Cuantos femeninos hay?'=>count($femenino),
            '¿Cuantos con problemas de salud?'=>count($problemas),
            '¿Cuantos sin problemas hay?'=>count($problemas),
            '¿Cuantos con beca hay?'=>count($becado),
            '¿Cuantos sin becas hay?'=>count($nbecado),
            '¿Cuantos en la mañana hay?'=>count($matutino),
            '¿Cuantos en la tarde hay?'=>count($vespertino),
            '¿Cuantos aprobados hay?'=>count($aprobados),
            '¿ Cuantos reprobados hay?'=>count($reprobados),
        ]);
    }

    public function beca (Request $Request)
    {

        $becado =  Empleado::where("becado","Si")->count();
        $nbecado =  Empleado::where("becado","No")->count();

        return response([
            'Si'=>$becado,
            'No'=>$nbecado,
        ]);
    }

    public function horario (Request $Request)
    {

        $matutino =  Empleado::where("horario","Matutino")->count();
        $vespertino =  Empleado::where("horario","Vespertino")->count();

        return response([
            'Matutino'=>$matutino,
            'vespertino'=>$vespertino,
        ]);
    }

    public function calificacion (Request $Request)
    {

        $reprobados =  Empleado::where("calificacion_prepa", "<=", "6")->count();
        $aprobados =  Empleado::where("calificacion_prepa",">=", "7")->count();

        return response([
            'reprobados' => $reprobados,
            'aprobados' => $aprobados,
        ]);
    }

    public function problemas (Request $Request)
    {

        $nproblemas =  Empleado::where("problemas_de_salud","No")->count();
        $problemas =  Empleado::where("problemas_de_salud","Si")->count();

        return response([
            'sin_problemas_de_salud'=>$nprobelmas,
            'problemas_de_salud'=>$problemas,
        ]);
    }


    public function create(Request $Request)
    {
        $data =$this->rules($Request);
        Empleado::create($data);
        return response([
            'message' => 'se creo con exito'
        ]);
    }

    public function show($id)
    {
        $empleados = Empleado::where('_id',$id)->first();
        return response($alumno);
    }

    public function update($id, Request $Request)
    {
            $data = $this->rules($Request);
            Empleado::find($id)->fill($data)->save();
            return response([
                'message' => 'se modifico'
            ]);
    }

    public function delete($id)
    {
            Empleado::find($id)->delete();
            return response([
                'message' => 'Borrado'
            ]);
    }
    protected function rules($Request){
     return $this->validate($Request,[
            'nombre' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'carrera' => 'required',
            'etnia_indigena' => 'required',
            'horario' => 'required',
            'calificacion_prepa' => 'required',
            'becado' => 'required',
            'problemas_de_salud' => 'required',

        ]);
    }
}
