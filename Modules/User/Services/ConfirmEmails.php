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
                throw new NotFoundHttpException(__('user::messages.not_found', ['attribute' => 'Token']), null, 18);
            }

            return view('user::auth.email.confirmed')
                ->withInput($token)
                ->withErrors(['token' => __('user::messages.not_found', ['entitie' => 'Token'])]);
        }

        $confirmed = $this->users->confirmEmail($user);

        if ($confirmed) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => __('user::messages.confirmed', ['attribute' => 'Email']),
                    'data' => [],
                ]);
            }

            return view('user::auth.email.confirmed');
        }
    }
}
