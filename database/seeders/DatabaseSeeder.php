<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(ArticleSeeder::class);
        $this->call(CompanyObjectSeeder::class);
        $this->call(CompanyStyleSeeder::class);
        $this->call(SicCodeSeeder::class);
        $this->call(RegistrationLocationSeeder::class);
        $this->call(CurrencySeeder::class);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
