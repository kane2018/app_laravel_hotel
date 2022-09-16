<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $role = \App\Models\Role::factory()->create(['title' => 'USER']);

        $picture = 'https://randomuser.me/api/portraits/men/' . mt_rand(1, 99) . '.jpg';

        \App\Models\User::factory()
            ->hasRoles(1, ['title' => 'ADMIN'])
            ->hasAttached($role)
            ->create([
                'first_name' => 'Makane',
                'last_name' => 'KANE',
                'introduction' => fake()->sentence,
                'description' => '<p>' . join('</p><p>', fake()->paragraphs(5)) . '</p>',
                'email' => 'makane@gmail.com',
                'picture' => $picture,
                'email_verified_at' => now(),
                'password' => Hash::make('password', ['rounds' => 12]),
                'remember_token' => Str::random(10),
            ]);


        $users = \App\Models\User::factory(10)->hasAttached($role)->create();


        for ($i = 0; $i < 30; $i++) {
            \App\Models\Ad::factory()
                ->has(\App\Models\Image::factory()->count(mt_rand(2, 5)))
                ->create(['user_id' => $users[mt_rand(0, 9)]->id]);
        }
    }
}
