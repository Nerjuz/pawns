<?php

namespace Tests\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait WithUser
{
    private string $userEmail = 'testUser@example.com';

    private string $userPassword = 'password';

    public function user(): User
    {
        return User::factory()->create([
            'email' => $this->userEmail,
            'password' => Hash::make($this->userPassword),
        ]);
    }
}
