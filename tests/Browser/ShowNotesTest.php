<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowNotesTest extends DuskTestCase
{
    /**
     * Tes menampilkan daftar catatan.
     * @group ShowNotes
     */
    public function testShowNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama dengan route "/"
                    ->clickLink('Log in') // Klik link "Log in"
                    ->assertPathIs('/login') // Memastikan halaman benar di link login
                    ->type('email', 'user123@email.com') // Mengisi field email
                    ->type('password', 'password') // Mengisi password
                    ->press('LOG IN') // Klik tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan halaman benar di link dashboard
                    ->clickLink('Notes') // Klik link "Notes"
                    ->assertPathIs('/notes') // Memastikan halaman benar di link notes
                    ->clickLink('Catatan Modul 3'); // Mengklik link "Catatan Modul 3" di notes
        });
    }
}
