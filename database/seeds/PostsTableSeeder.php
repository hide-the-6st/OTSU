<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
              'user_id' => 1,
              'title' => 'hoge',
              'content' => 'fuga',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'user_id' => 2,
              'title' => 'hoge',
              'content' => 'fuga2',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
