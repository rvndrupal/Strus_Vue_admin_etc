<?php

namespace App\Policies;

use App\User;
use App\Usuarios;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuariosPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function permisoEditar(User $user, Usuarios $usuarios)
    {
        return $user->id == $usuarios->user_id;
    }

    public function admin(User $user, Usuarios $usuarios){
        return $user->id == 1;
    }

    // public function nopass(User $user, Usuarios $usuarios){
    //     return $user->id != $usuarios->user_id;
    // }
}
