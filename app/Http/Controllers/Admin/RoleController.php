<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::latest('id')->paginate(10);

        return Inertia::render('Roles/Index', [
            'roles' => RoleResource::collection($roles),
            'headers' => [
                ['label' => 'Name', 'name' => 'name'],
                ['label' => 'Created At', 'name' => 'created_at'],
                ['label' => 'Actions', 'name' => 'actions'],
            ],
        ]);
    }

    public function create()
    {
        return \inertia()->render('Roles/Create', [
            'edit' => false,
            'title' => 'Create Role',
        ]);
    }

    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        return \inertia()->render('Roles/Create', [
            'edit' => true,
            'title' => 'Edit Role',
            'role' => new RoleResource($role),
        ]);
    }

    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }
}
