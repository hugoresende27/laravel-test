<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{

    /** @test  */
    public function check_if_root_site_is_correct(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    /** @test  */
    public function check_if_login_function_is_working()
    {

        $user = User::factory()->create([
            'email' => 'taylor'.rand(1,99).'@laravel.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }



    /** @test  */
    public function check_if_register_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'hugo22') // Modify the CSS selector to target the name input field correctly
                ->type('email', 'hugo55@hugo')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('Register')
                ->assertPathIs('/home')
                ->assertSee('Dashboard');

        });


    }

    /** @test  */
    public function check_if_dashboard_function_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->assertSee('You are logged in!');
        });
    }

}
