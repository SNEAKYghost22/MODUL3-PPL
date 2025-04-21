<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DisplayNoteTest extends DuskTestCase
{
    /**
     * Pengujian untuk menampilkan dan melihat detail catatan.
     * @group displaynote
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengakses halaman utama aplikasi
                    ->clickLink('Log in') // Menekan link "Log in" untuk berpindah ke halaman login
                    ->assertPathIs('/login') // Memastikan bahwa URL saat ini adalah "/login"
                    ->type('email', 'rafigiralu@gmail.com') // Mengisi input email dengan email pengguna yang terdaftar
                    ->type('password', '123') // Mengisi input password sesuai dengan akun pengguna
                    ->press('LOG IN') // Menekan tombol "LOG IN" untuk memproses autentikasi login
                    ->assertPathIs('/dashboard') // Memverifikasi bahwa pengguna berhasil diarahkan ke halaman dashboard
                    ->assertSee('Dashboard') // Mengecek bahwa teks "Dashboard" muncul di halaman, sebagai indikator login berhasil
                    ->clickLink('Note') // Menavigasi ke menu atau halaman "Note" untuk melihat daftar catatan
                    ->assertPathIs('/notes') // Memastikan bahwa URL saat ini adalah "/notes"
                    ->clickLink('coba') // Mengklik salah satu catatan dengan judul/link "coba"
                    ->assertPathIs('/note/1'); // Memverifikasi bahwa pengguna diarahkan ke halaman detail catatan dengan ID 1
        });
    }
}
