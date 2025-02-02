<?php

namespace Database\Seeders;

use App\Models\Hashtag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HashtagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hashtag::factory(30)->create();
    }
}
