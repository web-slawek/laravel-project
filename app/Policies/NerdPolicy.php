<?php

namespace App\Policies;

use App\User;
use App\Nerd;
use Illuminate\Auth\Access\HandlesAuthorization;

class NerdPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public function destroy(User $user, Nerd $nerd)
    {
        return $user->id === $nerd->user_id;
    }
}
