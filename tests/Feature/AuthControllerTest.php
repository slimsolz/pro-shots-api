<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    private $testUser = [
        'fullname' => 'Test',
        'role' => 'PO',
        'username' => 'mary',
        'password' => 'testPassword123!',
    ];

    public function testAllFieldsAreRequiredForRegistration()
    {
        $this->json('POST', 'api/v1/auth/register')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "fullname" => ["The fullname field is required."],
                    "role" => ["The role field is required."],
                    "username" => ["The username field is required."],
                ]
            ]);
    }

    public function testItSuccessfullyRegisterAUser()
    {
        $this->json('POST', '/api/v1/auth/register', [
            'fullname' => $this->testUser['fullname'],
            'role' => $this->testUser['role'],
            'username' => $this->testUser['username'],
            'password' => $this->testUser['password'],
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'token',
                'message',
                'data' => [
                    'id',
                    'fullname',
                    'username',
                    'role'
                ]
            ])
            ->assertJson([
                'message' => 'registration successful',
            ]);
    }

    public function testItSuccessfullyLoginAsAnAdminUser()
    {
        $newUser = User::factory()->create();

        $this->json('POST', '/api/v1/auth/login', [
        'username' => $newUser['username'],
        'password' => 'testPassword1$'
    ])
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure([
            'token',
            'message',
            'data' => [
                'id',
                'fullname',
                'username',
                'role'
            ]
        ])
        ->assertJson([
            'message' => 'login successful',
        ]);
    }

    public function testItReturns401IfEmailIsWrong()
    {
        $this->json('POST', '/api/v1/auth/login', [
            'username' => 'unknown',
            'password' => $this->testUser['password']
        ])
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJsonStructure(['message'])
            ->assertJson([
                'message' => 'Invalid username or password'
            ]);
    }
    public function testItReturns401IfPasswordIsWrong()
    {
        $this->json('POST', '/api/v1/auth/login', [
            'username' => $this->testUser['username'],
            'password' => 'wrongPassword21!'
        ])
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJsonStructure(['message'])
            ->assertJson([
                'message' => 'Invalid username or password'
            ]);
    }
}
