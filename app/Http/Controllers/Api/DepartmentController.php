<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class DepartmentController extends Controller
{

public function index(): JsonResponse
{
    return response()->json(Departments::all());
}


public function store(Request $request): JsonResponse
{
    $data = $request->validate([
    'name' => 'required|string|unique:departments,name',
    ]);


    $departments = Departments::create($data);


    return response()->json($departments, 201);
}
}