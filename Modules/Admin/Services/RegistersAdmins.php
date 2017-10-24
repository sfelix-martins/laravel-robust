<?php

namespace Modules\Admin\Services;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

trait RegistersAdmins
{
    public function register(array $data)
    {
        $this->validator($data)->validate();

        event(new Registered($admin = $this->adminRepository->create($data)));

        return $admin;
    }

    public function validator($data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:admins',
            'password'      => 'required|string|min:6',
        ]);
    }
}
