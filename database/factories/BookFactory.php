<?php

namespace Database\Factories;

use App\Models\authore;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\This;

use function Illuminate\Support\years;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        //     'title'=>$this->faker->sentences(3),
        //     'isbn'=>$this->faker->unique()->isbn13(),
        //     'description'=>$this->faker->paragraph(),
        //     'Author_id'=>authore::inRandomOrder()->first()?->id()?? authore::factory(),
        //     'genra'=>$this->faker->randomElement(['fiction','noval','fantesy','genral']),
        //     'published_at'=>$this->faker->date(),
        //     'avalible_copies'=>$this->faker->numberBetween(1,30),
        //     'statuse'=>$this->faker->randomElement(['avalible','unavalible']),
        //     'cover_imges'=>$this->faker->imageUrl('200','200','books', true),
        //     'tottle_copies'=>$this->faker->numberBetween(1,30)
        // ];
    'title' => $this->faker->sentence(3),
    'isbn' => $this->faker->unique()->isbn13(),
    'description' => $this->faker->paragraph(),

    'author_id' => authore::inRandomOrder()->first()?->id ?? authore::factory(),

    'genra' => $this->faker->randomElement(['fiction','novel','fantasy','general']),

    'published_at' => $this->faker->date(),

    'avalible_copies' => $this->faker->numberBetween(1, 30),

    'statuse' => $this->faker->randomElement(['avalible','unavalible']),

    'cover_imges' => $this->faker->imageUrl(200, 200, 'books', true),

    'tottle_copies' => $this->faker->numberBetween(1, 30),
];
    }
}
