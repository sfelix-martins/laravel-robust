<?php

namespace Modules\User\Services;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ConfirmEmails
{
    public function verify($token)
    {
        $user = $this->users->findByConfirmationToken($token);
        if (!$user) {
            throw new NotFoundHttpException('Token not found.', null, 18);
        }

        $confirmed = $this->users->confirmEmail($user);

        if ($confirmed) {
            return response()->json([
                'message' => 'Email confirmed ',
                'data' => []
            ]);
        }
    }
}
