<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotesTest extends DuskTestCase
{
    /**
     * Tes menghapus catatan.
     * @group DeleteNotes
     */
    public function testDeleteNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama dengan route "/"
                    ->clickLink('Log in') // Klik link "Log in" untuk masuk ke halaman login
                    ->type('email', 'user2@gmail.com') // Mengisi kolom email dengan user terdaftar
                    ->type('password', 'password') // Mengisi kolom password
                    ->press('LOG IN') // Menekan tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan bahwa user diarahkan ke halaman dashboard
                    ->assertSee('Dashboard') // Memastikan teks "Dashboard" muncul di halaman
                    ->clickLink('Notes') // Klik link "Notes" untuk membuka halaman daftar catatan
                    ->assertPathIs('/notes') // Memastikan URL saat ini adalah '/notes'
                    ->press('Delete'); // Menekan tombol "Delete" untuk menghapus catatan
        });
    }
}
