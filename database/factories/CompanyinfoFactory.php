<?php

namespace Database\Factories;

use \App\Models\Homepage\CompanyInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyinfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'humanresourse' => "$this->faker->buildingNumber()",
            'year' => "$this->faker->buildingNumber()",
            'customercompetition' => "$this->faker->buildingNumber()",
            'ongoingproject' => "$this->faker->buildingNumber()",
            'projectdone' => "$this->faker->buildingNumber()",

        ];
    }
}
