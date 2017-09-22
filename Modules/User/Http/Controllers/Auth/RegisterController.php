<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\User\Services\RegistersUsers;
use Modules\User\Repositories\Contracts\UserRepositoryInterface as UserRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. The logic to create users is implemented on
    | Modules\User\Services\RegistersUsers service using UserRepository to
    | access model layer
    |
    */

    use RegistersUsers;

    protected $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function registerUser(Request $request)
    {
        $user = $this->register($request->all());

        return $this->registered($request, $user);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'User created with success.',
                'data' => $user,
            ], 201);
        }
    }
}
