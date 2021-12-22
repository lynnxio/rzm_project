<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Category;
use App\Models\Asset;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Status::factory(5)->create();
        Category::factory(5)->create();
        Asset::factory(10)->create();
        User::factory(1)->create();
        Event::factory(10)->create();

        $asset = Asset::all();

        Event::all()->each(function ($event) use ($asset) {
            $event->asset()->attach(
                $asset->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
