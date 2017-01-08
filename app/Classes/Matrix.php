<?php 
namespace App\Classes;
 
class Matrix
{	
	public $dimensiones;
	
    public function Matrix($dimensiones)
    {
    	$this->dimensiones = $dimensiones;


    }
    public function getDimensiones()
    {
    	return $this->dimensiones;
    }

	
	public function getQuery($x1, $y1, $z1, $x2, $y2, $z2)
    {
    	if($x1>$x2||$y1>$y2||$z1>$z2)
    	{
    		throw new Exception('El limite inferior no puede ser mayor al superior');
    	}
    	if($x1>$dimensiones||$x2>$dimensiones||$y1>$dimensiones||$y2>$dimensiones||$z1>$dimensiones||$z2>$dimensiones)
    	{
    		throw new Exception('Los valores no pueden ser superiores a las dimensiones');	
    	}
    	if($x1<1||$x2<1||$y1<1||$y2<1||$z1<1||$z2<1)
    	{
    		throw new Exception('Los valores no pueden ser inferiores a 1');	
    	}
    }
	
	public function updateCelda($x, $y, $z, $valor)
    {
    	if($x<1||$y<1||$z<1)
    	{
    		throw new Exception('Los valores no pueden ser inferiores a 1');	
    	}
    	if($x>$dimensiones||$y>$dimensiones||$z>$dimensiones)
    	{
    		throw new Exception('Los valores no pueden ser superiores a las dimensiones');	
    	}
    	if($valor>pow(10,9))
    	{
    		throw new Exception('nuevo valor no permitido, es mayor a 10^9');	
    	}
    	if($valor<pow(-10,9))
    	{
    		throw new Exception('nuevo valor no permitido, es menor a 10^9');	
    	}
    }
 
}
?>