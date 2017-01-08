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

    }
	
	public function updateCelda($x, $y, $z, $valor)
    {
    	
    }
 
}
?>