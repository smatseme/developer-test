<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\IUserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements IUserRepository
{   
    protected $user = null;

    public function list() : LengthAwarePaginator 
    {   
        return User::paginate(10);
    }

    public function findById($id) : User
    {
        return User::find($id);
    }

    public function storeOrUpdate($id = null, $data = [] )
    {   
        if(is_null($id)) {
            $user = new User;
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            $user->email = $data['email'];
            $user->position = $data['position'];
            $user->save();

            return $user;
        }

        $user = User::find($id);
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->position = $data['position'];
        $user->save();

        return $user;
    }
    
    public function destroyById($id)
    {
        return User::find($id)->delete();
    }
}