<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * Contoh pengujian fitur edit catatan.
     * @group editnote
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Akses halaman beranda aplikasi
                    ->clickLink('Log in') // Navigasi ke halaman login
                    ->assertPathIs('/login') // Pastikan URL saat ini mengarah ke "/login"
                    ->type('email', 'rafigiralu@gmail.com') // Masukkan email pengguna ke form
                    ->type('password', '123') // Masukkan kata sandi pengguna
                    ->press('LOG IN') // Tekan tombol untuk masuk ke akun
                    ->assertPathIs('/dashboard') // Verifikasi berhasil masuk ke dashboard
                    ->clickLink('Notes') // Menuju ke bagian catatan
                    ->assertPathIs('/notes') // Pastikan saat ini berada di halaman catatan
                    ->clickLink('Edit') // Pilih opsi untuk menyunting catatan
                    ->type('title', 'telah di edit') // Ganti isi judul catatan
                    ->press('UPDATE'); // Simpan perubahan yang dilakukan
        });
    }
}
