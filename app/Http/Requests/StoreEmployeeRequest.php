<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreEmployeeRequest extends FormRequest
{
public function authorize()
{
    return true;
}


public function rules()
{
    return [
    'name' => 'required|string|max:255',
    'email' => ['required','email','max:255', Rule::unique('employees','email')],
    'department_id' => ['required','integer','exists:departments,id'],
    'salary' => ['nullable','numeric'],
    ];
}
}