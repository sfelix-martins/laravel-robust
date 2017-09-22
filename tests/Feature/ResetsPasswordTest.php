<?php

namespace Tests\Feature;

use Tests\TestCase;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResetsPasswordTest extends TestCase
{
    use DatabaseTransactions;

    public function testSendResetLink()
    {
        Notification::fake();

        $user = factory(User::class)->create();

        $this->json('POST', '/v1/password/email', ['email' => $user->email])
            ->assertStatus(200)
            ->assertJsonStructure($this->successJsonStructure());

        Notification::assertSentTo([$user], ResetPassword::class);
    }

    public function testResetPassword()
    {
        Notification::fake();

        $user = factory(User::class)->create();

        $this->json('POST', '/v1/password/email', ['email' => $user->email])
            ->assertStatus(200)
            ->assertJsonStructure($this->successJsonStructure());

        $token = '';
        Notification::assertSentTo(
            $user,
            ResetPassword::class,
            function ($notification, $channels) use (&$token) {
                $token = $notification->token;
                return true;
            }
        );

        $this->json('POST', '/v1/password/reset', [
                'email'                 => $user->email,
                'token'                 => $token,
                'password'              => 'secret',
                'password_confirmation' => 'secret'
            ])
            ->assertStatus(200)
            ->assertJsonStructure($this->successJsonStructure());
    }

    public function successJsonStructure()
    {
        return ['message', 'data' => []];
    }
}
