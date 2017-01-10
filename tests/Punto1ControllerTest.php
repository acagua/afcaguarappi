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
     * Validar el error si no hay casos que probar cuando el número de testcases es válido
     *
     * @return void
     */
    public function testTestcasesValido()
    {
    	$this->visit('/punto1')
    	->type('1', 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 2: Inexistente');
    }

	/**
     * Validar si los parámetros del testcase son válidos y coinciden
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

    	$this->visit('/punto1')
    	->type("1 \n 2 3", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 2: Número de operaciones no coincide');
    }

	/**
     * Validar la estructura de las operaciones
     *
     * @return void
     */
    public function testOperaciones()
    {
    	$this->visit('/punto1')
    	->type("1 \n 2 1\n vacio", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Debe iniciar con "QUERY" o "UPDATE"');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n QUERY", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Se esperan 6 valores numéricos despues de "QUERY"');

		$this->visit('/punto1')
    	->type("1 \n 2 1\n QUERY 1 1 1 1 1 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Se esperan 6 valores numéricos despues de "QUERY"');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Se esperan 4 valores numéricos despues de "UPDATE"');
    	
    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 1 1 1 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Se esperan 4 valores numéricos despues de "UPDATE"');
    }

    /**
     * Validar los parámetros para la función QUERY
     *
     * @return void
     */
    public function testQuery()
    {

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n QUERY 1 1 a 1 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Valor del parámetro 4 debe ser numérico');

		$this->visit('/punto1')
    	->type("1 \n 2 1\n QUERY 3 1 1 1 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: El limite inferior no puede ser mayor al superior');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n QUERY 1 3 1 1 3 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Los rangos no pueden ser superiores a las dimensiones');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n QUERY 1 1 0 1 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Los rangos no pueden ser inferiores a 1');
    }

    /**
     * Validar los parámetros para la función UPDATE
     *
     * @return void
     */
    public function testUpdate()
    {

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 1 1 a 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Valor del parámetro 4 debe ser numérico');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 3 1 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Los indices de la celda no pueden ser superiores a las dimensiones');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 1 0 1 1", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Error en línea 3: Los indices de la celda no pueden ser inferiores a 1');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 1 1 1 1000000001", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('El nuevo valor debe ser mayor a -10^9 y menor a 10^9');

    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 1 1 1 -1000000001", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('El nuevo valor debe ser mayor a -10^9 y menor a 10^9');
    }

	/**
     * Validar entradas válidas
     *
     * @return void
     */
    public function testEntradaValida()
    {
    	$this->visit('/punto1')
    	->type("1 \n 2 1\n UPDATE 1 1 1 8", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('Respuesta:');

    	$this->visit('/punto1')
    	->type("1 \n 2 3\n UPDATE 1 1 1 8 \n UPDATE 2 2 2 8 \n QUERY 1 1 1 2 2 2", 'entrada')
    	->press('Enviar')
    	->seePageIs('/punto1')
    	->see('16');
    }

}
