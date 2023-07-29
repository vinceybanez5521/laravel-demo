<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function test_register(): void
    {
        $name = fake()->name();
        $email = fake()->unique()->safeEmail();
        $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $password_confirmation = $password;
        
        $response = $this->post('/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_login(): void {
        $response = $this->post('/login', [
            'email' => 'jdoe@email.com',
            'password' => '12345678',
        ]);

        $response->assertRedirect('/home');
    }
}
