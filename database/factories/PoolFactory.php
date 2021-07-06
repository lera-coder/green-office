<?php

namespace Database\Factories;

use App\Models\Pool;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pool::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_ukr' => $this->faker->word,
            'title_rus' => $this->faker->word,
            'card_title_ukr' => $this->faker->word,
            'card_title_rus' => $this->faker->word,
            'price' => $this->faker->randomDigitNotNull,
            'short_description_ukr' => $this->faker->text,
            'short_description_rus' => $this->faker->text,
            'description_ukr' => $this->faker->text,
            'description_rus' => $this->faker->text,
            'length' => $this->faker->word,
            'width' => $this->faker->word,
            'height' => $this->faker->word,
            'main_image' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
