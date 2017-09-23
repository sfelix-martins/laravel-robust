<?php

namespace Modules\User\Services;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

trait RegistersUsers
{
    public function register(array $data)
    {
        $this->validator($data)->validate();

        event(new Registered($user = $this->users->create($data)));

        return $user;
    }

    public function validator($data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6',
            'facebook_id'   => 'nullable|string',
        ]);
    }
}
