<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssetFactory extends Factory
{
    /**
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $filepath = $this->faker->image(public_path('images/assets'), '640', '480', null, true);
        return [
            'name' => $name,
            'code' => Str::camel($name),
            'image' => str_replace('/home/vagrant/code/example_app/public/', '', $filepath),
            'qty_balance' => $this->faker->randomNumber(range(0, 255)),
            'category_id' => Category::all('id')->random(),
            'status_id' => Status::all('id')->random(),
        ];
    }
}
