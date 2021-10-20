<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\GroupCity;
use App\Models\City;
use App\Models\Discount;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $campaigns = \App\Models\Campaign::factory(10)->make()->toarray();

        foreach ($campaigns as $campaign) {
            $campaign = Campaign::create($campaign);
            $groupCity = GroupCity::factory()->make()->toarray();
            $group = $campaign->groupCity()->create($groupCity);
            $city = City::factory()->make()->toarray();
            $group->city()->create($city);
            
        }
        Discount::factory(10)->create();
        Product::factory(10)->create();
    }
}
