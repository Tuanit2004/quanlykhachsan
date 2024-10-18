<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UserSeeder::class);
        $this->call(roleSeeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin',
            'password'=>bcrypt('admin'),
            'role_id'=>1,
        ]);
    }
}

class roleSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->insert([
            ['role_name'=>'admin'],
            ['role_name'=>'Quản lý']
        ]);
    }
}
