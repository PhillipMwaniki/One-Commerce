<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200|unique:roles,name'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
