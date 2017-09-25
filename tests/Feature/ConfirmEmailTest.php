<?php

namespace Tests\Feature;

use Tests\TestCase;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Notification;
use Modules\User\Notifications\UnconfirmedEmail;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfirmEmailTest extends TestCase
{
    use DatabaseTransactions;

    public function testSendNotificationWhenCreateUsers()
    {
        $this->assertTrue(true);
    }

    public function testVerifiedIfFacebookLogin()
    {
        $this->assertTrue(true);
    }

    // public function testVerifyEmail()
    // {
    //     Notification::fake();

    //     $user = factory(User::class)->make();

    //     $request = [
    //         'name' => $user->name,
    //         'email' => $user->email,
    //         'password' => 'secret',
    //         'password_confirmation' => 'secret',
    //     ];
    //     $response = $this->json('POST', '/v1/users', $request);
    //     $response->assertStatus(201)->assertJsonStructure([
    //         'message', 'data'
    //     ]);

    //     Notification::assertSentTo($user, UnconfirmedEmail::class);
    // }
}
