<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->insert([
        //     'title' => 'Primeira Postas',
        //     'description' => 'Postagem teste com seeds',
        //     'content' => 'Conteúdo da postagem',
        //     'is_active' => true,
        //     'slug' => 'primeira-postagem',
        //     'user_id' => 1,
        // ]);

        factory(\App\Post::class, 30)->create();
    }
}
