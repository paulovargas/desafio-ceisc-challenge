<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
         DB::table('users')->insert([
         'name' => 'Mr. Dude',
         'email' => 'dude@gmail.com',
         'password' => bcrypt('123456'),
         ]);          
         
         DB::table('postagem')->insert([
            'titulo' => 'Primeiro Teste',
            'descricao' => 'Esta é a postagem de teste',
            'ativa' => 'S',
            ]);
         }
        
}
