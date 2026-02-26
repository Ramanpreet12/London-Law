<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $styles = [
            'UK POUNDS',
            'Euros',
            'US Dollars',
        ];

        foreach ($styles as $style) {
            Currency::updateOrCreate(
                ['name' => $style]
            );
        }
    }
}
