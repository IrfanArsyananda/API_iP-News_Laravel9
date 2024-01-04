<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $now = new \DateTime();

        DB::table('users')->insert([
            'email' => "superadmin@gmail.com",
            'username' => "superadmin",
            'password' => md5('superadmin'),
            'fullname' => "Super Admin",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'email' => "admin@gmail.com",
            'username' => "admin",
            'password' => md5('admin'),
            'fullname' => "Admin",
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $randTitle = $faker->text(10);
            DB::table('posts')->insert([
                'title' => $randTitle,
                'slug' => Str::slug($randTitle),
                'content' => $faker->text(100),
                'author' => rand(1, 2),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('comments')->insert([
                'post_id' => rand(1, 5),
                'user_id' => rand(1, 2),
                'content' => $faker->text(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
