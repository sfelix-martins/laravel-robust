<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Passport;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testRegisterUser()
    {
        Event::fake();

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

        $user = $response->original['data'];

        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }

    public function testRegisterUserValidation()
    {
        $params = [
            'email' => 'name',
            'password' => 1
        ];
        $response = $this->json('POST', '/v1/users', $params);
        $response->assertStatus(422)->assertJsonStructure($this->errorResponse(true));
    }

    public function testGetUserWithNotExistentUser()
    {
        $response = $this->json('GET', '/v1/users/0');
        $response->assertStatus(404)->assertJsonStructure($this->errorResponse());
    }

    public function testGetAnotherUser()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $anotherUser = factory(User::class)->create();

        $response = $this->json('GET', '/v1/users/'.$anotherUser->id);
        $response->assertStatus(403)->assertJsonStructure($this->errorResponse());
    }

    public function testGetUser()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $response = $this->json('GET', '/v1/users/'.$user->id);
        $response->assertStatus(200);
    }

    private function errorResponse($validation = false)
    {
        if ($validation) {
            return ['errors' => [['status', 'code', 'source' => ['parameter'], 'title', 'detail',]]];
        } else {
            return ['errors' => [['status', 'code', 'source' => ['pointer'], 'title', 'detail',]]];
        }
    }
}
