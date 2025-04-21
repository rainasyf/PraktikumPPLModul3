<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * Tes logout.
     * @group Logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama dengan route "/"
                    ->clickLink('Log in') // Klik link "Log in" untuk masuk ke halaman login
                    ->type('email', 'user2@gmail.com') // Mengisi kolom email dengan user terdaftar
                    ->type('password', 'password') // Mengisi kolom password
                    ->press('LOG IN') // Menekan tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan bahwa user diarahkan ke halaman dashboard
                    ->assertSee('Dashboard') // Memastikan teks "Dashboard" muncul di halaman
                    ->press('user') // Klik tombol atau dropdown dengan label "user"
                    ->clickLink('Log Out') // Klik link "Log Out" untuk keluar dari dashboard
                    ->assertPathIs('/'); // Memastikan bahwa user diarahkan kembali ke halaman utama
        });
    }
}

