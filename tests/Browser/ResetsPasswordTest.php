<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResetsPasswordTest extends DuskTestCase
{
    use DatabaseTransactions;

    public function testSendResetLink()
    {
        $user = factory(User::class)->create();

        Notification::fake();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/password/reset')
                    ->assertSee('Reset Password')
                    ->type('email', $user->email)
                    ->press('Send Password Reset Link')
                    ->assertPathIs('/password/reset');
        });

        // https://github.com/laravel/dusk/issues/121
        // Notification::assertSentTo([$user], ResetPassword::class);
    }
}
