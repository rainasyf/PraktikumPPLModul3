<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Tes login.
     * @group Login
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama dengan route "/"
                    ->assertSee('Praktikum PPL') // Membaca teks "Praktikum PPL"
                    ->clickLink('Log in') // Klik link "Log in"
                    ->assertPathIs('/login') // Memastikan halaman benar di link login
                    ->type('email', 'user123@email.com') // Mengisi field email
                    ->type('password', 'password') // Mengisi password
                    ->press('LOG IN') // Klik tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan halaman benar di link dashboard
                    ->assertSee('Dashboard'); // Membaca teks "Dashboard"
        });
    }
}
