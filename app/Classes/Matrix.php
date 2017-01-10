<?php 
namespace App\Classes;
 

class Matrix
{	

	private $matriz;

	private $dimensiones;

    /**
     * Crea la matriz inicializada con valor cero en todas sus celdas
     *
     * @param ($dimensiones) Las dimensiones que tendrá la matriz en sus 3 ejes
     * @return array
     */
    function createMatriz($dimensiones)
    {
    	$this->dimensiones = $dimensiones;
    	$matriz = [[[]]];
    	for($i=1; $i<=$dimensiones; $i++)
    	{
    		for($j=1;$j<=$dimensiones; $j++)
	    	{
	    		for($k=1;$k<=$dimensiones; $k++)
		    	{
		    		$matriz[$i][$j][$k] = 0;
		    	}		
	    	}	
    	}
    	$this->matriz = $matriz;
    	return $matriz;
    }

    /**
     * Devuelve la matriz en su estado actual
     *
     * @return array
     */
    public function getMatriz()
    {
    	return $this->matriz;
    }

    /**
     * Devuelve el valor de la celda dada por sus coordenadas
     *
     * @param ($x) coordenada en el eje x de la matriz
     * @param ($y) coordenada en el eje y de la matriz
     * @param ($z) coordenada en el eje z de la matriz
     * @return int
     */
    public function getCell($x,$y,$z)
    {
    	return $this->matriz[$x][$y][$z];
    }

    /**
     * Devuelve el valor que define las dimensiones de la matriz
     *
     * @return int
     */
    public function getDimensiones()
    {
    	return $this->dimensiones;
    }

    /**
     * Devuelve la suma de las celdas comprometidas en el rango en cada eje dado por lo parámetros
     *
     * @param ($x1) coordenada inferior del rango para el eje x de la matriz
     * @param ($y1) coordenada inferior del rango para el eje y de la matriz
     * @param ($z1) coordenada inferior del rango para el eje z de la matriz
     * @param ($x2) coordenada superior del rango para el eje x de la matriz
     * @param ($y2) coordenada superior del rango para el eje y de la matriz
     * @param ($z2) coordenada superior del rango para el eje z de la matriz
     * @return int
     */
	public function getQuery($x1, $y1, $z1, $x2, $y2, $z2)
    {
    	$dimensiones = $this->getDimensiones();
    	if($x1>$x2||$y1>$y2||$z1>$z2)
    	{
    		return 'El limite inferior no puede ser mayor al superior';
    	}
    	if($x1>$dimensiones||$x2>$dimensiones||$y1>$dimensiones||$y2>$dimensiones||$z1>$dimensiones||$z2>$dimensiones)
    	{
    		return 'Los rangos no pueden ser superiores a las dimensiones';	
    	}
    	if($x1<1||$x2<1||$y1<1||$y2<1||$z1<1||$z2<1)
    	{
    		return 'Los rangos no pueden ser inferiores a 1';	
    	}

    	$total = 0;

    	for($i=$x1;$i<=$x2;$i++)
    	{
			for($j=$y1;$j<=$y2;$j++)
	    	{
	    		for($k=$z1;$k<=$z2;$k++)
		    	{
		    		$total += $this->matriz[$i][$j][$k];
		    	}		
	    	}    		
    	}

    	return $total;
    }
	
    /**
     * Actualiza el valor de la celda dada por sus coordenadas
     *
     * @param ($x) coordenada en el eje x de la matriz
     * @param ($y) coordenada en el eje y de la matriz
     * @param ($z) coordenada en el eje z de la matriz
     * @param ($valor) Nuevo valor para de la celda
     * @return int
     */
	public function updateCelda($x, $y, $z, $valor)
    {
    	$dimensiones = $this->getDimensiones();
    	if($x<1||$y<1||$z<1)
    	{
    		return 'Los indices de la celda no pueden ser inferiores a 1';
    	}
    	if($x>$dimensiones||$y>$dimensiones||$z>$dimensiones)
    	{
    		return 'Los indices de la celda no pueden ser superiores a las dimensiones';
    	}
    	if($valor>pow(10,9)||$valor<pow(-10,9))
    	{
    		return 'El nuevo valor debe ser mayor a -10^9 y menor a 10^9';
    	}
    	
    	$this->matriz[$x][$y][$z] = $valor;
    	
    	return 0;
    }
 
}
?>