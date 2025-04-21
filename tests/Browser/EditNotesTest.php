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
                    ->clickLink('Log in') // Klik link "Log in" untuk masuk ke halaman login
                    ->type('email', 'user2@gmail.com') // Mengisi kolom email dengan user terdaftar
                    ->type('password', 'password') // Mengisi kolom password
                    ->press('LOG IN') // Menekan tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan bahwa user diarahkan ke halaman dashboard
                    ->assertSee('Dashboard') // Memastikan teks "Dashboard" muncul di halaman
                    ->clickLink('Notes') // Klik link "Notes" untuk membuka halaman daftar catatan
                    ->assertPathIs('/notes') // Memastikan URL saat ini adalah '/notes'
                    ->clickLink('Edit') // Klik link atau tombol "Edit" pada salah satu catatan
                    ->assertSee('Edit Note') // Memastikan halaman edit catatan muncul
                    ->type('title', 'Catatan Modul 3 - Diedit') // Mengisi ulang kolom judul dengan teks baru
                    ->type('description', 'Catatan ini telah diedit untuk testing fitur edit') // Mengisi ulang kolom deskripsi
                    ->press('UPDATE') // Menekan tombol "UPDATE" untuk menyimpan perubahan
                    ->pause(2000) // Memberikan jeda selama 2 detik agar proses update selesai
                    ->visit('/notes'); // Mengarahkan ulang secara eksplisit ke halaman daftar catatan
        });
    }
}