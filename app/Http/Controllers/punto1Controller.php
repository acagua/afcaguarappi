<?php

namespace App\Http\Controllers;

use App\Http\Requests\Punto1FormRequest;
use Illuminate\Http\Request;
use App\Classes\Matrix;

class punto1Controller extends Controller
{
    //
    public function index()
    {
    	return view('pages.punto1');
    }

    public function process(Punto1FormRequest $request)
    {
    	$entrada = $request->get('entrada');


		$lineas = explode("\n", $entrada);

		$testcases = trim($lineas[0]);
		$resultado = "Respuesta: \n";
		if(!is_numeric($testcases)||$testcases<=0||$testcases>50)
		{
    		return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea 1: '.$testcases);
		}
	
		
		//posición de nuevo testcase
		$posTestcase = 1;

		//linea actual
		$lineaAct = 1;

		//por cada testcase
		for($i=0;$i<$testcases;$i++)
		{
			$lineaAct++;

			if(count($lineas)<$lineaAct)
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': Inexistente');
			}
			
			$testcaseData = explode(" ",trim($lineas[$posTestcase]));

			if(count($testcaseData)!=2||!is_numeric($testcaseData[0])||!is_numeric($testcaseData[1]))
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': '.$lineas[$posTestcase]);
			}

			$dimensiones = $testcaseData[0];
			$ops = $testcaseData[1];

			if($dimensiones>100||$dimensiones<1||$ops>1000||$ops<1)
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': '.$lineas[$posTestcase]);
			}

			    
			$matriz = new Matrix;
			$matriz->createMatriz($dimensiones);
			
		  	/*$valorCelda = $matriz->getCell(1,1,1);
		  	return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('matriz '.$valorCelda);
		  	*/

			$baseOps = $lineaAct;
			
			if($ops+$baseOps>count($lineas))
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($ops+$baseOps).': inexistente');
			}

			for($j=$baseOps;$j<$ops+$baseOps;$j++)
			{
				$lineaAct++;

				$accion = explode(" ",trim($lineas[$j]));

				$error = false;

				if($accion[0]=="QUERY")
				{
					if(count($accion)==7)
					{
						for($k=1;$k<count($accion)&&!$error;$k++)
						{
							if(!is_numeric($accion[$k]))
							{
								$error = true;
							}
						}
						if(!$error)
						{
							$query = $matriz->getQuery($accion[1],$accion[2],$accion[3],$accion[4],$accion[5],$accion[6]);
							if(!is_numeric($query))
							{
								return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': '.$query);
							}
							else
							{
								$resultado.=$query."\n"; 
							}
						}
					}
					else
					{
						$error = true;
					}
				}
				elseif($accion[0]=="UPDATE")
				{
					if(count($accion)==5)
					{
						for($k=1;$k<count($accion)&&!$error;$k++)
						{
							if(!is_numeric($accion[$k]))
							{
								$error = true;
							}
						}
						if(!$error)
						{
							$update = $matriz->updateCelda($accion[1],$accion[2],$accion[3],$accion[4]);
							if(!is_numeric($update))
							{
								return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': '.$update);
							}

						}
						//CONTINUA CON LA ACTUALIZACION DE LA MATRIZ
					}
					else
					{
						$error = true;
					}
				}
				else 
				{
					$error = true;
				}

				if($error == true)
				{
					return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': '.$lineas[$j]);
				}
			}
			$posTestcase = $lineaAct;
		}

    	return \Redirect::route('punto1')->with(['salida'=>$entrada, 'respuesta' => $resultado]);
    }
}
