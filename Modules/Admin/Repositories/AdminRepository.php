<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Entities\Admin;
use Modules\Admin\Repositories\Contracts\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function create(array $data)
    {
        return $this->admin->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
