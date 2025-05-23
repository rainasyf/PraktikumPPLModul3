<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * Tes mengedit catatan.
     * @group EditNotes
     */
    public function testEditNote(): void
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
                    ->clickLink('Edit') // Klik link "Edit" pada note
                    ->type('title', 'Catatan Modul 3 - Diedit') // Mengubah input judul note
                    ->press('UPDATE'); // Klik "UPDATE" untuk menyimpan perubahan
        });
    }
}