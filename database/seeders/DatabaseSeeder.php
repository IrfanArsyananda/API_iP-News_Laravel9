<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
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
        // $now = new \DateTime();
        $now = Carbon::now();
        $unique_code = $now->format('ymdhis');

        DB::table('users')->insert([
            // 'id' => "1" . $unique_code,
            'email' => "superadmin@gmail.com",
            'username' => "superadmin",
            'password' => md5('superadmin'),
            'fullname' => "Super Admin",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            // 'id' => "2" . $unique_code,
            'email' => "admin@gmail.com",
            'username' => "admin",
            'password' => md5('admin'),
            'fullname' => "Admin",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            // 'id' => "2" . $unique_code,
            'email' => "user@gmail.com",
            'username' => "user",
            'password' => md5('user'),
            'fullname' => "User",
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $randTitle = $faker->text(10);
            DB::table('posts')->insert([
                'title' => $randTitle,
                'slug' => $unique_code . "-" . Str::slug($randTitle),
                'content' => $faker->text(100),
                'author' => rand(1, 3),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('comments')->insert([
                'post_id' => rand(1, 5),
                'user_id' => rand(1, 3),
                'content' => $faker->text(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
