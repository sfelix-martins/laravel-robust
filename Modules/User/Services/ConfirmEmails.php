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

        dd($this->users->confirmEmail($user));
    }
}
