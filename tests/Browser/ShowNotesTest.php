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
                    ->clickLink('Log in') // Mengklik link untuk menuju halaman login
                    ->type('email', 'user2@gmail.com') // Mengisi input email dengan user terdaftar
                    ->type('password', 'password') // Mengisi input password dengan password user
                    ->press('LOG IN') // Menekan tombol login
                    ->assertPathIs('/dashboard') // Memastikan bahwa user diarahkan ke halaman dashboard
                    ->assertSee('Dashboard') // Memastikan teks "Dashboard" muncul sebagai indikator berhasil login
                    ->clickLink('Notes') // Mengklik link "Notes" di dashboard
                    ->assertPathIs('/notes') // Memastikan diarahkan ke halaman /notes
                    ->clickLink('Catatan Modul 3') // Mengklik link "Catatan Modul 3" di notes
                    ->assertPathIs('/note/6'); // Memastikan diarahkan ke halaman /note/6
        });
    }
}
