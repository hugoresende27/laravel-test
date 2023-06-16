<?php

namespace Tests\Browser;

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
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'hugo@hugo')
                ->type('password', '12345678')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }
}
