<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'name' => 'Companies Act 2006-Model Articles',
                'has_object' => false,// Instruction: Object  hidden
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Flat Management Company - with Shares',
                'has_object' => false,
                'has_share_capital' => false,// Instruction: Issued Share Capital hidden
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Flat Management Company - Guarantee',
                'has_object' => true,
                'has_share_capital' => false, 
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => "Full CCV (Chairman's Casting Vote) in Board Meetings",
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => "Full No CCV (Chairman's Casting Vote)",
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Full with A & B Shares Vote / Non-Vote with CCV',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => true, // Instruction: Enables A&B share fields
            ],
            [
                'name' => 'Full with A & B Shares with Different Dividend with CCV',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => true,
            ],
            [
                'name' => 'Holding Company',
                'has_object' => false,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Section 60 Standard Guarantee (Limited not included in Name)',
                'has_object' => false,
                'has_share_capital' => false, // Instruction: Issued Share Capital hidden
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Standard Guarantee',
                'has_object' => true,
                'has_share_capital' => false, // Instruction: Issued Share Capital hidden
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Standard PLC',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Standard PLC - €50,000 shares',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Standard RTM Guarantee',
                'has_object' => false, // Instruction: Object dropdown hidden
                'has_share_capital' => false, // Instruction: Issued Share Capital hidden
                'show_std_rtm_guarantee_address' => true, // Instruction: Show Property Address
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Subsidiary',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Transfer Pre-emption Family with CCV',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
            [
                'name' => 'Transfer Pre-emption with CCV',
                'has_object' => true,
                'has_share_capital' => true,
                'show_std_rtm_guarantee_address' => false,
                'is_ab_shares' => false,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['name' => $article['name']], $article);
        }
    }
}
