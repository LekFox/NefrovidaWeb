<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuariosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user -> rol == 'Administrador';
    }
    
    public function admin(User $user)
    {
        return $user -> rol == 'Administrador';
    }

    public function procuracion(User $user)
    {
        return $user -> rol == 'Procuracion';
    }

    public function nutricion(User $user)
    {
        return $user -> rol == 'Nutricion';
    }

    public function psicologo(User $user)
    {
        return $user -> rol == 'Psicologia';
    }

    public function medica(User $user)
    {
        return $user -> rol == 'Medica';
    }

    public function social(User $user)
    {
        return $user -> rol == 'Social';
    }

    public function nefro(User $user)
    {
        return $user -> rol == 'Nefropediatria';
    }

    public function lab(User $user)
    {
        return $user -> rol == 'Laboratorio';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
