
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Food;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    protected $model = Food::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->lastName(),
            // 'categories' => $this->faker->numberBetween(0,1),
            // 'stock' => $this->faker->numberBetween(0,1),
            'categories' => $this->faker->rand(0,1),
            'stock' => $this->faker->rand(0,1),
        ];
    }
}
