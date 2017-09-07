<?php

namespace Tests\Feature;

use Modules\User\Entities\User;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testRegisterUser()
    {
        $user = factory(User::class)->make();

        $request = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];
        $response = $this->json('POST', '/v1/users', $request);
        $response->assertStatus(201)->assertJsonStructure([
            'message', 'data'
        ]);
    }

    public function testRegisterUserValidation()
    {
        $response = $this->json('POST', '/v1/users', []);
        $response->assertStatus(422)->assertJsonStructure($this->errorResponse(true));
    }

    public function testGetUserWithNotExistentUser()
    {
        $response = $this->json('GET', '/v1/users/1');
        $response->assertStatus(404)->assertJsonStructure($this->errorResponse());
    }

    public function testGetAnotherUser()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $anotherUser = factory(User::class)->create();

        $response = $this->json('GET', '/v1/users/'.$anotherUser->id);
        $response->assertStatus(403)->assertJsonStructure(['code', 'message']);
    }

    private function errorResponse($validation = false)
    {
        if ($validation) {
            return ['code', 'message', 'errors' => [['code', 'field', 'message']]];
        } else {
            return ['code', 'message', 'description'];
        }
    }
}
