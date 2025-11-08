<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Jobs\SendWelcomeEmailJob;
use App\Models\Employees;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
public function index(Request $request): JsonResponse
{
    $query = Employees::with('department');


    if ($request->has('department')) {
        $query->whereHas('department', fn($q) => $q->where('name', $request->query('department')));
    }


    $perPage = (int) $request->query('per_page', 0);


    if ($perPage > 0) {
        $paginated = $query->paginate($perPage);
        return response()->json($paginated);
    }


    $employees = $query->get()->map(function ($e) {
        return [
        'id' => $e->id,
        'name' => $e->name,
        'email' => $e->email,
        'salary' => $e->salary,
        'department' => $e->department?->name,
        'deleted_at' => $e->deleted_at,
        ];
    });


    return response()->json($employees);
}


public function store(StoreEmployeeRequest $request): JsonResponse
{
    $employee = Employees::create($request->validated());

    SendWelcomeEmailJob::dispatch($employee);


    return response()->json($employee->load('departments'), 201);
}


public function destroy($id): JsonResponse
{
    $employee = Employees::findOrFail($id);
    $employee->delete();


    return response()->json(['message' => 'Employee deleted successfully.']);
}
}