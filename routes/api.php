<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Departament;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// -------- 1. Criar, Listar, Buscar por Id, Atualizar, Deletar Funcionários

// Criar Funcio.
Route::post('/employees', function(Request $request){
    $employee = new Employee();
    $employee->name = $request->input('name');
    $employee->salary = $request->input('salary');
    $employee->role = $request->input('role');
    $employee->admission_date = $request->input('admission_date');

    $employee->departament_id = $request->input('departament_id');    

    $employee->save();
    return response()->json($employee);
});

// Listar todos os Funcionarios:
Route::get('/employees', function(){
    $employees = Employee::all();
    return response()->json($employees);
});

// Buscar por Id o Funcionario:
Route::get('/employees/{id}', function($id){
    $employee = Employee::find($id);
    return response()->json($employee);
});

// Atualizar Funcionario:
Route::patch('/employees/{id}', function(Request $request, $id){
    $employee = Employee::find($id);

    if ($request->input('name') !== null){
        $employee->name = $request->input('name');
    }
    if ($request->input('salary') !== null){
        $employee->salary = $request->input('salary');
    }
    if ($request->input('role') !== null){
        $employee->role = $request->input('role');
    }
    if ($request->input('admission_date') !== null){
        $employee->admission_date = $request->input('admission_date');
    }
    if ($request->input('departament_id') !== null){
        $employee->departament_id = $request->input('departament_id');
    }

    $employee->save();

    return response()->json($employee);
});

// Deletar Funcionario:
Route::delete('/employees/{id}', function($id){
    $employee = Employee::find($id);

    $employee->delete();

    return response()->json($employee);
});

// -------- 2. Criar, Listar, Buscar por Id, Atualizar, Deletar Departamentos

// Criar
Route::post('/departaments', function(Request $request) {
    $departament = new Departament();
    $departament->name = $request->input('name');
    $departament->location = $request->input('location');
    
    $departament->save();
    return response()->json($departament);
});

// Listar todos os Departamentos:
Route::get('/departaments', function(){
    $departament = Departament::all();
    return response()->json($departament);
});

// Buscar por Id o Departamento:
Route::get('/departaments/{id}', function($id){
    $departament = Departament::find($id);
    return response()->json($departament);
});

// Atualizar Departamento:
Route::patch('/departaments/{id}', function(Request $request, $id){
    $departament = Departament::find($id);

    if ($request->input('name') !== null){
        $departament->name = $request->input('name');
    }
    if ($request->input('location') !== null){
        $departament->location = $request->input('location');
    }

    $departament->save();

    return response()->json($departament);
});

// Deletar Departamento:
Route::delete('/departaments/{id}', function($id){
    $departament = Departament::find($id);

    $departament->delete();

    return response()->json($departament);
});

// ------------------ 3. Listar Funcionários com seus Departamentos

Route::get('/employees/departaments', function(){
    $employees = Employee::with('departaments')->get();
    return response()->json($employees);
});

// ------------------ 4. Listar Departamento com seus Funcionários

Route::get('/departaments/employees', function(){
    $departament = Employee::with('employees')->get();
    return response()->json($departament);
});

// ------------------ 5. Buscar Departamento de um Funcionário

Route::get('/employees/departaments/{id}', function($id){
    $employees = Employee::find($id);
    $departament = $employees->departament;

    return response()->json($departament);
});

// ------------------ 6. Buscar Funcionários de um Departamento

Route::get('/departaments/employees/{id}', function($id){
    $departament = Departament::find($id);
    $employees = $departament->employees;

    return response()->json($employees);
});