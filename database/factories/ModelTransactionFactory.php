<?php

use Faker\Generator as Faker;

$factory->define(App\Transactions::class, function (Faker $faker) {
    return [
        //

        'email'    => 'uweaime@gmail.com',
        'points'   => '10'
        
    ];
});
