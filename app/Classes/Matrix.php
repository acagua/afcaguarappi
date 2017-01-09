<?php 
namespace App\Classes;
 
class Matrix
{	
	public $matriz;
	public $dimensiones;
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


    public function getMatriz()
    {
    	return $this->matriz;
    }

    public function getCell($x,$y,$z)
    {
    	return $this->matriz[$x][$y][$z];
    }


    public function getDimensiones()
    {
    	return $this->dimensiones;
    }

	
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
    	if($valor>pow(10,9))
    	{
    		return 'nuevo valor no permitido, es mayor a 10^9';
    	}
    	if($valor<pow(-10,9))
    	{
    		return 'nuevo valor no permitido, es menor a 10^9';
    	}
    	
    	$this->matriz[$x][$y][$z] = $valor;
    	
    	return 0;
    }
 
}
?>