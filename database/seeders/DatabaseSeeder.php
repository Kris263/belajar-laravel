<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Artikel;
use App\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = Users::find(1);
        if(!$users){
            Users::factory(1)->create();
        }

        Artikel::factory(20)->create();
    }
}