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

    public function create(array $data)
    {
        return $this->user->create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
            'facebook_id'   => isset($data['facebook_id']) ?? null,
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
