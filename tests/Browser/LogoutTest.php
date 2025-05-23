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
                    ->clickLink('Log in') // Klik link "Log in"
                    ->assertPathIs('/login') // Memastikan halaman benar di link login
                    ->type('email', 'user123@email.com') // Mengisi field email
                    ->type('password', 'password') // Mengisi password
                    ->press('LOG IN') // Klik tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan halaman benar di link dashboard
                    ->press('user') // Klik tombol atau dropdown dengan label "user"
                    ->clickLink('Log Out'); // Klik link "Log Out" untuk keluar dari dashboard
        });
    }
}

