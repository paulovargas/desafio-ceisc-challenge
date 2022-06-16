<?php

use App\Models\Postagem;
use Illuminate\Database\Seeder;

class PostagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postagem::factory(10)->create();
    }
}
