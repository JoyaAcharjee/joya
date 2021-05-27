<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::pluck('id')->toarray();
        return [
            'name'=> Str::random(10),
            'details'=>$this->faker->text($maxNbChars = 100) ,
            'price'=>$this->faker->numberBetween($min = 1000, $max = 4000) ,
            'category_id'=> $this->faker->randomElement($categories)
        ];
    }
}
