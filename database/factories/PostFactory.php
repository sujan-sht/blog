<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'user_id' => function () {
                return factory(App\Models\User::class)->create()->id;
            }, 
            'category_id' => function () {
                return factory(App\Models\Category::class)->create()->id;
            }, 
            'slug' => Str::slug(title),
            'view_count'=>$this->faker->number,
            'image' => $this->faker->image('public/frontend/assets/images',640,480, null, false),
            ];
    }
}
