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
                    ->assertSee('Praktikum PPL') // Memastikan teks "Praktikum PPL" ada
                    ->clickLink('Log in') // Mengklik link "Log in"
                    ->assertPathIs('/login') // Memastikan berada di halaman login
                    ->type('email', 'user2@gmail.com') // Mengisi email
                    ->type('password', 'password') // Mengisi password
                    ->press('LOG IN') // Menekan tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan diarahkan ke halaman dashboard
                    ->assertSee('Dashboard'); // Memastikan bahwa teks "Dashboard" muncul
        });
    }
}
