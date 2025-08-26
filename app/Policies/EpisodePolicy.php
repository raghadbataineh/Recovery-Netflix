<?php

namespace App\Policies;

use App\Models\Episod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EpisodePolicy
{
    use HandlesAuthorization;


    //the admin and employee can create, update, delete episodes 
    
    public function create(User $u){ return $u->isAdmin() || $u->isEmployee(); }
    public function update(User $u, Episod $e){ return $u->isAdmin() || $u->isEmployee(); }
    public function delete(User $u, Episod $e){ return $u->isAdmin() || $u->isEmployee(); }

    public function viewAny(User $u)
    {
         return $u->isAdmin(); 
    }

    public function view(User $u, Episod $e)
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
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
   

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Episode $episode)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Episode $episode)
    {
        //
    }
}
