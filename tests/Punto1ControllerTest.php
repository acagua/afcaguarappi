<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Punto1ControllerTest extends TestCase
{

    /**
     * Probar si la entrada es vacía
     *
     * @return void
     */
    public function testEntrada()
    {
    	$this->visit('/punto1')
    	->type('', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Entrada');

    	$this->visit('/punto1')
    	->type(' ', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('The entrada field is required.');
    }

    /**
     * Validar si el número de testcases no es numérico, es inferior a 1 y es superior a 50
     *
     * @return void
     */
    public function testTestcases()
    {
    	$this->visit('/punto1')
    	->type('invalid', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 1: Debe ser un valor entre 1 y 50');

    	$this->visit('/punto1')
    	->type('0', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 1: Debe ser un valor entre 1 y 50');

    	$this->visit('/punto1')
    	->type('51', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 1: Debe ser un valor entre 1 y 50');	
    }

     /**
     * Validar error si no hay casos que probar cuando el número de testcases es válido
     *
     * @return void
     */
    public function testTestcases3()
    {
    	$this->visit('/punto1')
    	->type('1', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 2: Inexistente');
    }

	/**
     * Validar si los parámetros del testcase son válidos
     *
     * @return void
     */
    public function testParametrosTestcase()
    {
    	$this->visit('/punto1')
    	->type("1 \n 2 b", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 2: Deben ser dos valores numéricos');
    }

	/**
     * Validar si el número de operaciones coincide con el ingresado
     *
     * @return void
     */
    public function testOperaciones()
    {
    	$this->visit('/punto1')
    	->type("1 \n 2 3", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 2: Número de operaciones no coincide');
    }
}
