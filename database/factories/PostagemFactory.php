<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factory;
use App\Postagem;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

class PostagemFactory extends Factory
{
    /**
     * 
     * @return array
     */
    public function definition()
    {
        $thumb = $this->faker->image('public/images/posts', 640, 480);
        $title = $this->$faker->sentence(3);
    return [
        'titulo' => $title,
        'descricao' => Str::slug($title),
        'imagem' => str_replace('public','',$thumb),
        'ativa' => 'S',
        'remember_token' => Str::random(10),
    ];

    }
}

/**
 * 
 *$factory->define(Post::class, function (Faker $faker) {
 *    
 *});
 * 
 * 
 * 
 */
