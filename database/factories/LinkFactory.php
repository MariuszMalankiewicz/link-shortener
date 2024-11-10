<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LinkFactory extends Factory
{
    protected $model = \App\Models\Link::class;

    public function definition()
    {
        return [
            'original_url' => $this->faker->url,
            'short_code' => Str::random(6)
        ];
    }
}
