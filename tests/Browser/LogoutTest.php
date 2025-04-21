<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Praktikum PPL') // Cek apakah tulisan "Praktikum PPL" tampil di layar
            ->clickLink('Log in') // Tekan link "Log in" untuk pindah ke halaman login
            ->assertPathIs('/login') // Verifikasi bahwa path URL saat ini adalah "/login"
            ->type('email', 'rafigiralu@gmail.com') // Input alamat email ke field email
            ->type('password', '123') // Input kata sandi ke field password
            ->press('LOG IN') // Klik tombol "LOG IN" untuk mencoba masuk
            ->assertPathIs('/dashboard') // Setelah login berhasil, pastikan diarahkan ke halaman dashboard
            ->assertSee('Dashboard') // Pastikan tulisan "Dashboard" muncul sebagai tanda berhasil login
            ->press('muhammad rafi')
            ->clickLink('Log Out');

        });
    }
}
