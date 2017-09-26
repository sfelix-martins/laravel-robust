<?php

namespace Modules\User\Repositories;

use Modules\User\Entities\User;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByFacebookId($facebookId)
    {
        return $this->user->where('facebook_id', $facebookId)->first();
    }

    public function findByEmail($email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function findByConfirmationToken($token)
    {
        return $this->user->where('confirmation_token', $token)->first();
    }

    public function confirmEmail($user)
    {
        $user->confirmation_token = null;
        $user->confirmed = true;

        return $user->save();
    }

    public function create(array $data)
    {
        do {
            if (! $this->findByConfirmationToken($hash = md5(uniqid(rand(), true)))) {
                $confirmationToken = $hash;
            }
        } while (is_null($confirmationToken));

        return $this->user->create([
            'name'                  => $data['name'],
            'email'                 => $data['email'],
            'password'              => bcrypt($data['password']),
            'confirmation_token'    => $confirmationToken,
            'confirmed'             => isset($data['facebook_id']) ? true : false,
            'facebook_id'           => isset($data['facebook_id']) ?? null,
        ]);
    }

    public function update(int $id, array $data)
    {
        $user = $this->user->findOrFail($id);

        if ($user->update($data)) {
            return $user;
        }
    }
}
