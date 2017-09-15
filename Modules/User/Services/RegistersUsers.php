<?php

namespace Modules\User\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class RegistersUsers
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        $this->validator($data)->validate();

        event(new Registered($user = $this->userRepository->create($data)));

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
