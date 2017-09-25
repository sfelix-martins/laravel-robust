<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Modules\User\Repositories\Contracts\UserRepositoryInterface as UserRepository;

class ConfirmEmailController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
}
