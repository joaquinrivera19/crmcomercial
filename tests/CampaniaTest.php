<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CampaniaTest extends TestCase
{
    //Trait que permite hacer un rollback de la base después de cada test
    use DatabaseTransactions;
    //Trait que ignora el Middleware de autenticación
    use WithoutMiddleware;

    /**
     * Test para nueva campaña
     *
     * @return void
     */
  /*  public function testNuevaCampania()
    {
        $this->visit('/campania/create')
             ->type('Nueva campña', 'cam_nombre')
             ->type('2016/05/01', 'cam_fecini')
             ->type('2016/05/01', 'cam_fecfin')
             ->type('2016/05/01', 'cam_fecini')
    }*/
}
