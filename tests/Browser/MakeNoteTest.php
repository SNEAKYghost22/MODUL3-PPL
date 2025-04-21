<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MakeNoteTest extends DuskTestCase
{
    /**
     * Pengujian untuk membuat catatan baru.
     * @group makenote
     */
    public function testUserCanCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Akses halaman awal aplikasi
                    ->clickLink('Log in') // Masuk ke halaman login
                    ->assertPathIs('/login') // Verifikasi path login
                    ->type('email', 'rafigiralu@gmail.com') // Isi email pengguna
                    ->type('password', '123') // Isi password pengguna
                    ->press('LOG IN') // Tekan tombol login
                    ->assertPathIs('/dashboard') // Pastikan masuk ke dashboard
                    ->clickLink('Notes') // Arahkan ke halaman catatan
                    ->assertPathIs('/notes') // Verifikasi berada di halaman catatan
                    ->clickLink('Create Note') // Tekan tombol untuk membuat catatan baru
                    ->type('title', 'Catatan Baru') // Isi judul catatan
                    ->type('description', 'Isi dari catatan baru yang ditambahkan.') // Isi konten catatan
                    ->press('CREATE') // Tekan tombol simpan
                    ->assertSee('Catatan Baru'); // Pastikan catatan baru tampil di daftar
        });
    }
}
