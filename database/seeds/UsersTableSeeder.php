<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample Admin
        App\Models\User::create([
          'name' => 'Admin',
          'email' => 'admin@mail.com',
          'password' => bcrypt('password'),
          'role' => 'admin',
          'active' => 1,
          'photo' => 'http://blog.dev/photos/1/Users/avatar.png'
        ]);

        // Sample Author
        App\Models\User::create([
          'name' => 'Author',
          'email' => 'author@mail.com',
          'password' => bcrypt('password'),
          'role' => 'author',
          'active' => 1,
          'photo' => 'http://blog.dev/photos/1/Users/avatar.png'
        ]);

        // Sample Contributor
        App\Models\User::create([
          'name' => 'Contributor',
          'email' => 'contributor@mail.com',
          'password' => bcrypt('password'),
          'role' => 'contributor',
          'active' => 1,
          'photo' => 'http://blog.dev/photos/1/Users/avatar.png'
        ]);
    }
}
