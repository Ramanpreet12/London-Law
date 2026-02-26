<?php

namespace Database\Seeders;

use App\Models\CompanyStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $styles = [
            'LIMITED',
            'LTD',
            'CYFYNGEDIG',
            'CYF',
        ];

        foreach ($styles as $style) {
            CompanyStyle::updateOrCreate(
                ['name' => $style]
            );
        }
    
    }
}
