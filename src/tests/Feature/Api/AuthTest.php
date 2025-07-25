<?php

namespace Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\WithUser;

class AuthTest extends TestCase
{
    use WithUser, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user();
    }

    public function test_user_auth_endpoint_will_return_token(): void
    {
        $response = $this->postJson('/api/auth', [
            'email' => $this->userEmail,
            'password' => $this->userPassword,
        ])->assertSuccessful();

        $response->assertJsonStructure([
            'data' => ['token'],
        ]);
    }

    public function test_user_endpoint_auth_with_bad_credentials_will_return_error(): void
    {
        $response = $this->postJson('/api/auth', [
            'email' => $this->userEmail,
            'password' => 'bad_password',
        ])->assertStatus(401);

        $response->assertJsonStructure(['message']);
    }

    /**
     * @dataProvider incorrectUserDataProvider
     */
    public function test_user_auth_endpoint_without_mandatory_data_will_return_validation_error(array $body, array $expected): void
    {
        $response = $this->postJson('/api/auth',
            $body
        )->assertStatus(422);

        $response->assertJsonStructure($expected);
    }

    public static function incorrectUserDataProvider(): iterable
    {
        yield 'no password' => [
            'body' => [
                'email' => 'aaa@aa.com',
            ],
            'expected' => [
                'message',
                'errors' => ['password'],
            ],
        ];

        yield 'no email' => [
            'body' => [
                'password' => 'password',
            ],
            'expected' => [
                'message',
                'errors' => ['email'],
            ],
        ];

        yield 'no data' => [
            'body' => [],
            'expected' => [
                'message',
                'errors' => ['email', 'password'],
            ],
        ];

        yield 'bad email format' => [
            'body' => [
                'email' => 'bad_email@',
            ],
            'expected' => [
                'message',
                'errors' => ['email'],
            ],
        ];
    }
}
