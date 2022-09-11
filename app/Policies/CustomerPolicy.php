<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CustomerPolicy
{
    use HandlesAuthorization;


    public function view()
    {
        return Auth::user()->role->hasPermission('cliente-visualizar');
    }

    public function create()
    {
        return Auth::user()->role->hasPermission('cliente-criar');
    }

    public function update()
    {
        return Auth::user()->role->hasPermission('cliente-editar');
    }

    public function delete()
    {
        return Auth::user()->role->hasPermission('cliente-excluir');
    }


}
