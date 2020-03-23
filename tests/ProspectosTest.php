<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProspectosTest extends TestCase
{
    //Trait que permite hacer un rollback de la base después de cada test
    use DatabaseTransactions;
    //Trait que ignora el Middleware de autenticación
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNuevoProspecto()
    {
        $this->visit('/form/create')
             ->type('21 - Amiun S.A.', 'con_nombre')
             ->type('21', 'pro_conces')
             ->select(1, 'pro_categoria')
             ->select(3, 'pro_clasprod')
             ->select(2, 'pro_producto')
             ->select(3, 'coc_encuesta')
             ->select(1, 'pro_nombrecamp')
             ->select(2, 'pro_tiporig')
             ->type('Nombre origen', 'pro_nombreorig')
             ->select(4, 'coc_estado')
             ->select(1, 'coc_probcierre')
             ->select(1, 'pro_vendedor')
             ->type('100', 'coc_cotizapro')
             ->type('1', 'coc_cantdias')
             ->select(2, 'coc_modprest')
             ->type('100', 'coc_cotizaserv')
             ->type('2', 'coc_canthoras')
             ->select(2, 'coc_financia')
             ->type('200', 'coc_cotizatotal')
             ->type('2016/05/01', 'coc_fechademo')
             ->type('2016/05/01', 'pro_fechafac')
             ->type('A-11-12345678', 'pro_numfac')
             ->type('2016/05/01', 'coc_fecha')
             ->select(1, 'coc_modcont')
             ->type('Usuario', 'coc_usuario')
             ->select(2, 'coc_modocontac')
             ->select(1, 'coc_tipocont')
             ->select(1, 'coc_vendedor')
             ->type('2016/05/01', 'coc_detallecont')
             ->type('File Name', 'coc_adjunto')
             ->attach('public/storage/Conteo Mobile.pptx', 'coc_adjunto')
             ->type('2016/05/05', 'comp_fechaprox')
             ->select(3, 'comp_vendeprox')
             ->type('Detalleee', 'comp_detalleprox')
             ->press('Guardar')
             ->seeInDatabase('ComContactoProx', ['comp_detalleprox' => 'Detalleee'])
             ->seePageIs('/prospectos');
    }

}
