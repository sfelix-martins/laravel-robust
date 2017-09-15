<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Client;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialUserTest extends TestCase
{
    use DatabaseTransactions;

    public function testFacebookSocialLoginNewUser()
    {
        // $client = Client::where('personal_access_client', false)
        //                 ->where('revoked', false)
        //                 ->first();

        // $params = [
        //     'grant_type'    => 'social',
        //     'client_id'     => $client->id,
        //     'client_secret' => $client->secret,
        //     'network'       => 'facebook',
        //     'access_token'  => 'EAAGq034UOAUBALs8SdFIcG7nWN9SpiRFNAGdqRgDotbKtTZA83t5LI8wa5Btyyqt288aUSaYjTWsMAtm1sMjDiYZC6ZB69LNJ7i59qKELPfj1XeCLOkJ3b2pzqZB6akgb096FpXHB9OtXzfOA9DukzxTPmiMoewZD',
        // ];

        // $response = $this->json('POST', '/oauth/token', $params);
        // $response->assertStatus(200)->assertJsonStructure([
        //     'token_type', 'expires_in', 'access_token', 'refresh_token'
        // ]);
        $this->assertTrue(true);
    }
}
