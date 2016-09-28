<?php

namespace App\Dal\Eloquent;

use App\Dal\Contracts\IUserRepository;
use App\Dal\Models\User;

class UserRepository extends RepositoryBase
                     implements IUserRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return User::class;
    }
}