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
                    ->assertSee('Modul 3') // Memastikan bahwa teks "Modul 3" muncul di halaman
                    ->clickLink('Register') //Klik link dengan teks "Register" untuk membuka halaman registrasi
                    ->assertPathIs('/register') // Memastikan bahwa halaman yang dikunjungi adalah /register
                    ->type('name', 'user') // Mengisi field "name" dengan nama "user"
                    ->type('email', 'user' . rand(1000, 9999) . '@gmail.com') // Mengisi field "email" dengan email yang unik (random)
                    ->type('password', 'password') // Mengisi field "password" dengan password yang valid
                    ->type('password_confirmation', 'password') // Mengisi field "password_confirmation" dengan password yang sama
                    ->press('REGISTER') // Menekan tombol "REGISTER" untuk mengirimkan form registrasi
                    ->assertPathIs('/dashboard'); // Memastikan bahwa setelah registrasi, halaman yang dikunjungi adalah /dashboard
        });
    }
}
