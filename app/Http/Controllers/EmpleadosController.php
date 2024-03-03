<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function getEmpleados()
    {
        $empleados = [
            [
                'id' => 1,
                'nombre' => 'John Doe',
                'cargo' => 'Desarrollador',
                'salario' => 1000,
            ],
            [
                'id' => 2,
                'nombre' => 'Jane Doe',
                'cargo' => 'Diseñador',
                'salario' => 1200,
            ],
        ];

        return response()->json($empleados);
    }
}
