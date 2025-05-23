<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * Tes membuat catatan.
     * @group Notes
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama dengan route "/"
                    ->clickLink('Log in') // Klik link "Log in"
                    ->assertPathIs('/login') // Memastikan halaman benar di link login
                    ->type('email', 'user123@email.com') // Mengisi field email
                    ->type('password', 'password') // Mengisi password
                    ->press('LOG IN') // Klik tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan halaman benar di link dashboard
                    ->assertSee('Dashboard') // Membaca teks "Dashboard"
                    ->clickLink('Notes') // Klik link "Notes"
                    ->assertPathIs('/notes') // Memastikan halaman benar di link notes
                    ->clickLink('Create Note') // Klik "Create Note" untuk membuat catatan baru
                    ->assertPathIs('/create-note') // Memastikan halaman benar di link create-note
                    ->type('title', 'Catatan Modul 3') // Mengisi input judul note
                    ->type('description', 'Modul 3 PPL Mengenai Automatic Testing') // Mengisi input deskripsi note
                    ->press('CREATE'); // Klik "CREATE" untuk menyimpan
        });
    }
}
