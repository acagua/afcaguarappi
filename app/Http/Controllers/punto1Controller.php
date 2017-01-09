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
    		return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea 1: Debe ser un valor entre 1 y 50');
		}
	
		$posTestcase = 1;

		$lineaAct = 1;

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
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': Deben ser dos valores numéricos');
			}

			$dimensiones = $testcaseData[0];
			$ops = $testcaseData[1];

			if($dimensiones>100||$dimensiones<1)
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': El valor del tamaño debe estar entre 1 y 100');
			}
			if($ops>1000||$ops<1)
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': El número de operaciones debe estar entre 1 y 1000');
			}

			    
			$matriz = new Matrix;
			$matriz->createMatriz($dimensiones);

			$baseOps = $lineaAct;
			
			if($ops+$baseOps>count($lineas))
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($ops+$baseOps).': inexistente');
			}

			for($j=$baseOps;$j<$ops+$baseOps;$j++)
			{
				$lineaAct++;

				$accion = explode(" ",trim($lineas[$j]));

				if($accion[0]=="QUERY")
				{
					if(count($accion)==7)
					{
						for($k=1;$k<count($accion);$k++)
						{
							if(!is_numeric($accion[$k]))
							{
								return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': Valor del parámetro '.($k+1).' debe ser numérico');
							}
						}

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
					else
					{
						return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': Se esperan 6 valores numéricos despues de "QUERY"');
					}
				}
				elseif($accion[0]=="UPDATE")
				{
					if(count($accion)==5)
					{
						for($k=1;$k<count($accion);$k++)
						{
							if(!is_numeric($accion[$k]))
							{
								return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': Valor del parámetro '.($k+1).' debe ser numérico');
							}
						}

						$update = $matriz->updateCelda($accion[1],$accion[2],$accion[3],$accion[4]);
						if(!is_numeric($update))
						{
							return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': '.$update);
						}

					}
					else
					{
						return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': Se esperan 6 valores numéricos despues de "UPDATE"');
					}
				}
				else 
				{
					return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($j+1).': Debe iniciar con "QUERY" o "UPDATE');
				}

			}
			$posTestcase = $lineaAct;
		}
		$arreglo = explode("\n",$resultado);
    	return \Redirect::route('punto1')->with(['salida'=>$entrada, 'respuesta' => $arreglo]);
    }
}
