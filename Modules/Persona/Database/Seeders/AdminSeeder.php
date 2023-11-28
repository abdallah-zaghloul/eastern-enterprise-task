<?php

namespace Modules\Persona\Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $this->call([
             AdminSeeder::class
         ]);
    }
}
