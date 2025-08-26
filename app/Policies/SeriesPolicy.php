<?php

namespace App\Policies;

use App\Models\Series;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeriesPolicy
{
    use HandlesAuthorization;


    // only admin can create, update, delete series
    public function create(User $u){ return $u->isAdmin(); }
    public function update(User $u, Series $s){ return $u->isAdmin(); }
    public function delete(User $u, Series $s){ return $u->isAdmin(); }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $u)
    {
        return $u->isAdmin(); 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $u, Series $s)
    {
        
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
   

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Auth\Access\Response|bool
     */
   

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Auth\Access\Response|bool
     */
  
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Series $series)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Series $series)
    {
        //
    }
}
