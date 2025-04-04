<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            [
                'title' => 'Summer Sale 2025',
                'description' => 'Enjoy up to 50% off on all summer products. Limited time offer until June 30, 2025.',
                'image' => 'promotions/summer_sale.jpg',
            ],
            [
                'title' => 'New Collection Launch',
                'description' => 'Discover our latest Spring 2025 collection. Fresh designs and exclusive items now available in stores and online.',
                'image' => 'promotions/spring_collection.jpg',
            ],
            [
                'title' => 'Anniversary Celebration',
                'description' => 'Join us for our 10th anniversary celebration. Special discounts, giveaways, and more from April 15-20, 2025.',
                'image' => 'promotions/anniversary.jpg',
            ],
            [
                'title' => 'Flash Sale Weekend',
                'description' => 'Don\'t miss our flash sale this weekend! Huge discounts on selected products for 48 hours only.',
                'image' => 'promotions/flash_sale.jpg',
            ],
            [
                'title' => 'Loyalty Program',
                'description' => 'Join our loyalty program and earn points with every purchase. Redeem points for exclusive rewards and special offers.',
                'image' => 'promotions/loyalty.jpg',
            ],
        ];

        foreach ($promotions as $promotion) {
            Promotion::create($promotion);
        }
    }
}