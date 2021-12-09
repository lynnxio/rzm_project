<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    /**
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'code' => Str::camel($name),
            'qty_balance' => $this->faker->randomNumber(),
            'category_id' => Category::all('id')->random(),
            'status_id' => Status::all('id')->random(),
        ];
    }
}
