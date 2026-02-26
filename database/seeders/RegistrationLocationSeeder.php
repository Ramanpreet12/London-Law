<?php

namespace Database\Seeders;

use App\Models\RegistrationLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'England & Wales'],
            ['name' => 'Scotland'],
            ['name' => 'Wales'],
            ['name' => 'Northern Ireland'],
        ];

        foreach ($locations as $location) {
            RegistrationLocation::updateOrCreate(
                ['name' => $location['name']],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
