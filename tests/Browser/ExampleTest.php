<?php

namespace Tests\Browser;

use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $password = $faker->password;
            $browser->visit('/register')
                    ->assertSee('Register')
                ->type('name', $faker->name)
                ->type('email', $faker->email)
                ->type('password', $password)
                ->type('password_confirmation', $password)
                ->press('Register')
            ;
        });
    }

    public function testPostCreate()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $browser->visit('/posts/create')
                ->type('title', $faker->name)
                ->type('content', $faker->email)
                ->press('Отправить')
            ;
        });
    }
}
