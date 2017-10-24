<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Admin\Services\RegistersAdmins;
use Modules\Admin\Repositories\Contracts\AdminRepositoryInterface as AdminRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. The logic to create users is implemented on
    | Modules\Admin\Services\RegistersAdmins service using AdminRepository to
    | access model layer
    |
    */

    use RegistersAdmins;

    protected $adminRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function registerAdmin(Request $request)
    {
        $admin = $this->register($request->all());

        return $this->registered($request, $admin);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $admin)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Admin created with success.',
                'data' => $admin,
            ], 201);
        }
    }
}
