<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * Tes membuat register.
     * @group Register
     */
    public function testRegister(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama dengan route "/"
                    ->assertSee('Modul 3') // Membaca teks "Modul 3"
                    ->clickLink('Register') //Klik link "Register"
                    ->assertPathIs('/register') // Memastikan halaman benar di link register
                    ->type('name', 'user') // Mengisi field name
                    ->type('email', 'user123@email.com') // Mengisi field email
                    ->type('password', 'password') // Mengisi field password
                    ->type('password_confirmation', 'password') // Mengisi field password_confirmation dengan password yang sama
                    ->press('REGISTER') // Klik tombol "REGISTER"
                    ->assertPathIs('/dashboard'); // Memastikan halaman benar di link dashboard
        });
    }
}

