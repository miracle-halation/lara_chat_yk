<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
  use WithFaker;

  public function setUp(): void
  {
      parent::setUp();
      $this->user = User::factory()->create(['password' => bcrypt('laravel_test')]);
      $this->post = Post::factory()->create();
  }

  public function test_get_index()
  {
    $response = $this->actingAs($this->user)
                     ->get('/posts');
    $response->assertStatus(200);
    $response->assertViewIs('posts.index');
  }
}
