<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      $file = UploadedFile::fake()->image('avatar.jpg');
      $path = $file->store('test', 'public');
      $read_temp_path = str_replace('public/', '/storage/', $path);
      return [
        'title' => fake()->title(),
        'content' => fake()->text(),
        'img_path' => $read_temp_path
      ];
    }
}
