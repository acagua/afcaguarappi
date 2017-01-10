<?php

namespace App\Http\Controllers;

use App\Http\Requests\Punto1FormRequest;
use Illuminate\Http\Request;
use App\Classes\Matrix;

class punto1Controller extends Controller
{
    /**
     * Muestra la página inicial del punto 1 donde se ingresa la entrada
     *
     * @return view
     */
    public function index()
    {
    	return view('pages.punto1');
    }

    /**
     * Procesa la entrada del usuario y despliega el resultado
     *
     * @param ($request) Tiene la información del formulario enviado por el usuario
     * @return view
     */
    public function process(Punto1FormRequest $request)
    {
    	$entrada = $request->get('entrada');

		$lineas = explode("\n", $entrada);

		$testcases = trim($lineas[0]);

		$resultado = "Respuesta: \n";

		//validaciónes sobre la primera línea de la entrada
		if(!is_numeric($testcases)||$testcases<=0||$testcases>50)
		{
    		return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea 1: Debe ser un valor entre 1 y 50');
		}
		
		//Posicion de la linea de inicio del testcase
		$posTestcase = 1;

		//Línea actual de la entrada
		$lineaAct = 1;

		for($i=0;$i<$testcases;$i++)
		{
			$lineaAct++;
			
			if(count($lineas)<$lineaAct)
			{	

				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.(count($lineas)+1).': Inexistente');
			}
			
			$testcaseData = explode(" ",trim($lineas[$posTestcase]));

			//Validación de los parámetros iniciales del testcase (tipo de dato)
			if(count($testcaseData)!=2||!is_numeric($testcaseData[0])||!is_numeric($testcaseData[1]))
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': Deben ser dos valores numéricos');
			}

			//dimensiones de la matriz
			$dimensiones = $testcaseData[0];

			//número de operaciones del testcase actual
			$ops = $testcaseData[1];

			// Validaciones de los parámetros iniciales del testcase (valor de las dimensiones y número de operaciones)
			if($dimensiones>100||$dimensiones<1)
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': El valor del tamaño debe estar entre 1 y 100');
			}
			if($ops>1000||$ops<1)
			{
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors('Error en línea '.($posTestcase+1).': El número de operaciones debe estar entre 1 y 1000');
			}

			//Ejecución de operaciones del testcase
			$testCaseResult = $this->execTestcase($dimensiones, $ops, $lineaAct, array_slice($lineas,$lineaAct,$ops));
			
			if(strpos($testCaseResult, "Error") !== false)
			{	
				return \Redirect::route('punto1')->with('salida',$entrada)->withErrors($testCaseResult);
			}

			$resultado .= $testCaseResult;
			$lineaAct += $ops;
			$posTestcase = $lineaAct;
		}

		$arreglo = explode("\n", $resultado);
    	return \Redirect::route('punto1')->with(['salida'=>$entrada, 'respuesta' => $arreglo]);
    }

    /**
     * Procesa las operaciones y las aplica sobre la matriz
     *
     * @param ($dimensiones) Valor que recibe para la construcción de la matriz (en sus dimensiones)
     * @param ($ops) Número de operaciones que se ejecutará sobre la matriz
     * @param ($lineaAct) Línea base para los errores
     * @param ($lineas) Arreglo con las operaciones para el testcase
     * @return view
     */
    public function execTestcase($dimensiones, $ops, $lineaAct, $lineas)
    {
		//Creación de la matriz en 0 con las dimensiones de entrada
		$matriz = new Matrix;
		$matriz->createMatriz($dimensiones);
		$resultado = "";

		if($ops>count($lineas))
		{
			return 'Error en línea '.($lineaAct).': Número de operaciones no coincide';
		}
		for($j=0;$j<$ops;$j++)
		{

			$accion = explode(" ",trim($lineas[$j]));

			//Validación del tipo de Operación
			if($accion[0]=="QUERY")
			{
				if(count($accion)==7)
				{
					for($k=1;$k<count($accion);$k++)
					{
						if(!is_numeric($accion[$k]))
						{
							return 'Error en línea '.($lineaAct+$j+1).': Valor del parámetro '.($k+1).' debe ser numérico';
						}
					}

					$query = $matriz->getQuery($accion[1],$accion[2],$accion[3],$accion[4],$accion[5],$accion[6]);
					
					if(!is_numeric($query))
					{
						return 'Error en línea '.($lineaAct+$j+1).': '.$query;
					}
					$resultado .= $query."\n"; 
				}
				else
				{
					return 'Error en línea '.($lineaAct+$j+1).': Se esperan 6 valores numéricos despues de "QUERY"';
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
							return 'Error en línea '.($lineaAct+$j+1).': Valor del parámetro '.($k+1).' debe ser numérico';
						}
					}

					$update = $matriz->updateCelda($accion[1],$accion[2],$accion[3],$accion[4]);
					if(!is_numeric($update))
					{
						return 'Error en línea '.($lineaAct+$j+1).': '.$update;
					}

				}
				else
				{
					return 'Error en línea '.($lineaAct+$j+1).': Se esperan 4 valores numéricos despues de "UPDATE"';
				}
			}
			else 
			{
				return 'Error en línea '.($lineaAct+$j+1).': Debe iniciar con "QUERY" o "UPDATE"';
			}
		}
		return $resultado;
    }
}
