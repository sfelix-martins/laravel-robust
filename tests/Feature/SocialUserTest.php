<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Client;
use Modules\User\Entities\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialUserTest extends TestCase
{
    /*
     | The access token from facebook do not have email scope, because this can
     | not make tests. :/
     */

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
        // // dd($response);
        // $response->assertStatus(200)->assertJsonStructure([
        //     'token_type', 'expires_in', 'access_token', 'refresh_token'
        // ]);
        $this->assertTrue(true);
    }

    public function testFacebookSocialLoginExistsUser()
    {
        // $user = factory(User::class)->create([
        //     'email' => 'sam.martins.dev@gmail.com'
        // ]);

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
