<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group deletenote
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('Log in') // Masuk ke halaman login
            ->assertPathIs('/login') // Verifikasi path login
            ->type('email', 'rafigiralu@gmail.com') // Isi email pengguna
            ->type('password', '123') // Isi password pengguna
            ->press('LOG IN') // Tekan tombol login
            ->assertPathIs('/dashboard') // Pastikan masuk ke dashboard
            ->clickLink('Notes') // Arahkan ke halaman catatan
            ->assertPathIs('/notes') // Verifikasi berada di halaman catatan
            ->press('Delete');
        });
    }
}
