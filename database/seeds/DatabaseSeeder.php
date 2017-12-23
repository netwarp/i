<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run() {
        DB::table('users')->insert([
            'name' => 'mr_admin',
            'email' => 'mr_admin@admin.com',
            'password' => bcrypt('edit_photos_and_videos_later1976')
        ]);
    }
}
