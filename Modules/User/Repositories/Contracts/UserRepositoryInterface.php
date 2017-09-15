<?php

namespace Modules\User\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function findByFacebookId($facebookId);

    public function findByEmail($email);

    public function create(array $data);

    public function update(int $id, array $data);
}
