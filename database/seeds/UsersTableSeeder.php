<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          [
            'name' => 'hide',
            'email' => 'test@hide.com',
            'password' => Hash::make('testhide'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
          [
            'name' => 'hiro',
            'email' => 'test@hiro.com',
            'password' => Hash::make('testhiro'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
      ]);
    }
}
