<?php 
namespace App\Classes;
 
class Matrix
{	
	public $dimensiones;
	
	public $ops;

    public function Matrix($dimensiones,$ops)
    {
    	$this->dimensiones = $dimensiones;
    	$this->ops = $ops;

    }
    public function getDimensiones()
    {
    	return $this->dimensiones;
    }
    
    public function getOps()
    {
    	return $this->ops;
    }
	
	public function getQuery($x1, $y1, $z1, $x2, $y2, $z2)
    {

    }
	
	public function updateCelda($x, $y, $z, $valor)
    {
    	
    }
 
}
?>