<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => ['required','min:3'],
            'email'      => ['required','email',Rule::unique('users')],
            'password'   => ['required','min:8'],
            'role_id'    => ['required'],
        ]);

        $validated['password'] = bcrypt($request->password);
        User::create($validated);

        return to_route('users.index')->with('msg','Usuário cadastrado com sucesso!');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('roles','user'));
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'       => ['required','min:3'],
            'email'      => ['required','email',Rule::unique('users')->ignore($user->id)],
            'role_id'    => ['required'],
        ]);

        User::find($user->id)->update($validated);

        return to_route('users.index')->with('msg','Usuário editado com sucesso!');
    }


    public function destroy(User $user)
    {
        User::find($user->id)->delete();

        return to_route('users.index')->with('msg','Usuário excluído com sucesso!');
    }

}
