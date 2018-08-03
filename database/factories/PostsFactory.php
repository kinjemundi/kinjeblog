<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $image = "Post_Image_".rand(1,5).".jpg";
    return [
        'author_id' => rand(1,3),
        'title' => $faker->sentence(10),
        'slug' => $faker->slug(),
        'body' => $faker->paragraphs(rand(10,20),true),
        'featured_image' => rand(0,1) == 1 ? $image : NULL,
    ];
});
