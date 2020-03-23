<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{

    /**
     * Test que valida el registro de nuevo usuario
     *
     * @return void
     */
    public function testNuevoUsuario()
    {
        $this->visit('/register')
            ->type('Favio Miyno', 'name')
            ->type('fmiyno', 'login')
            ->type('favio.miyno@sorzana.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Registrar')
            ->seePageIs('/prospectos');

    }

    /**
     * Test que valida que funcione el Middleware web encargado de
     * verificar que se esté logueado para ver las rutas que
     * se encuentran entro de él
     *
     * @return void
     */
    public function testAuthFilter()
    {
        //Descomentar este método en caso de querer testear sin tener en cuenta el Middleware web
        //$this->withoutMiddleware();

        $response = $this->call('GET', '/prospectos');

        $this->assertRedirectedTo('/login');
    }

    /**
     * Test que valida el login
     */
    public function testLogin()
    {
        $this->visit('/login')
             ->type('lucasa', 'username')
             ->type('123456', 'password')
             ->press('Entrar')
             ->seePageIs('/prospectos');
    }
}
