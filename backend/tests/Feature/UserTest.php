<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
  use WithFaker;

  public function setUp(): void
  {
      parent::setUp();
      $this->user = User::factory()->create(['password' => bcrypt('laravel_test')]);
  }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_success_login()
    {
      $response = $this->post('login', [
        'email'    => $this->user->email,
        'password' => 'laravel_test'
      ]);
      $response->assertStatus(302);
      $this->assertAuthenticated();
      $response->assertRedirect('/home');
    }

    public function test_success_register()
    {
      $user = [
        'name'    => $this->faker()->name(),
        'email'    => $this->faker()->unique()->safeEmail(),
        'password' => 'laravel_test'
      ];
      $response = $this->post('register', [
        'name' => $user['name'],
        'email' => $user['email'],
        'password' => $user['password'], 
        'password_confirmation' => $user['password'], 
      ]);
      $response->assertStatus(302);
      $this->assertDatabaseHas('users', [
        'name' => $user['name'],
        'email' => $user['email']
      ]);
      $this->assertAuthenticated();
      $response->assertRedirect('/home');
    }


}
