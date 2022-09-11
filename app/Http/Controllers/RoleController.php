<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','min:5',Rule::unique('roles')],
        ]);

        Role::create($validated);

        return to_route('roles.index')->with('msg','Função cadastrada com sucesso!');
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        //$permissions = Permission::where('id','>','9')->get();
        return view('admin.roles.edit',compact('role','permissions'));
    }


    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required','min:5',Rule::unique('roles')->ignore($role->id)],
        ]);

        Role::find($role->id)->update($validated);

        return to_route('roles.index')->with('msg','Função editada com sucesso!');
    }


    public function destroy(Role $role)
    {
        Role::find($role->id)->delete();

        return to_route('roles.index')->with('msg','Função excluída com sucesso!');
    }

    public function assignPermission(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);

        return to_route('roles.index')->with('msg','Permissão associada com sucesso!');
    }

}
