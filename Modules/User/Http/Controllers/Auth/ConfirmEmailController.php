<?php

namespace Modules\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Modules\User\Services\ConfirmEmails;
use Modules\User\Repositories\Contracts\UserRepositoryInterface as UserRepository;

class ConfirmEmailController extends Controller
{
    use ConfirmEmails;

    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
}
