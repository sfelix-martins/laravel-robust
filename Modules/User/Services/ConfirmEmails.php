<?php

namespace Modules\User\Services;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ConfirmEmails
{
    public function verify(Request $request, $token)
    {
        $user = $this->users->findByConfirmationToken($token);
        if (! $user) {
            if ($request->expectsJson()) {
                throw new NotFoundHttpException('Token not found.', null, 18);
            }

            return view('user::auth.email.confirmed')
                ->withInput($token)
                ->withErrors(['token' => 'Token not found.']);
        }

        $confirmed = $this->users->confirmEmail($user);

        if ($confirmed) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Email confirmed ',
                    'data' => [],
                ]);
            }

            return view('user::auth.email.confirmed');
        }
    }
}
