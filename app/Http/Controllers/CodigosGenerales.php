<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// PARA LA RUTA BASE
use Illuminate\Support\Facades\URL;

trait CodigosGenerales
{

    private static string $llaveGeneral = 'Cpmp-Sv-2022_#!*/';

    /**
     * Get the value of llaveVisitante
     *
     * @return string $llaveVisitante
     */
    protected static function getLlaveGeneral(): string
    {
        return self::$llaveGeneral;
    }


    protected static function encrypt(string $string, string $key):string  {
            $result = '';
            for($i=0; $i<strlen($string); $i++) {
               $char = substr($string, $i, 1);
               $keychar = substr($key, ($i % strlen($key))-1, 1);
               $char = chr(ord($char)+ord($keychar));
               $result.=$char;
            }
            return base64_encode($result);
        }
     
    protected static function decrypt(string $string, string $key):string  {
        $result = '';
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
           $char = substr($string, $i, 1);
           $keychar = substr($key, ($i % strlen($key))-1, 1);
           $char = chr(ord($char)-ord($keychar));
           $result.=$char;
        }
        return $result;
    }
    
    protected static function selectInputGeneral(array $data, String $idNameSelect, String $optionInicial, String $idTable, String $valueTable, String $paramBuscar, String $classs = '', String $size = ''):String{
		$selec = '<select class="form-control '. $classs .'" id="'. $idNameSelect .'" name="'. $idNameSelect .'" '. $size .'>';
		$selec .= '<option value="'. $optionInicial .'" >'. $optionInicial .'</option>'; 
		
		foreach ( $data as $key => $value) {
			if( $value[$valueTable] != 'inactivo'  ){
			   $selected = $value[$idTable ] == $paramBuscar? 'selected': '';
			   $selec .= '<option value="'.$value[$idTable].'" '. $selected .'>'.$value[$valueTable].'</option>'; 
		    }
		}
		return $selec .= '</select>'; 
	}

	protected static function selectInputPaisCodeArea(array $data, String $idNameSelect, String $optionInicial, String $idTable, String $valueTable, String $paramBuscar, String $class = '', String $size = ''):String{
		$selec = '<select class="'. $class .'" id="'. $idNameSelect .'" name="'. $idNameSelect .'" '. $size .'>';
		$selec .= '<option value="'. $optionInicial .'" >'. $optionInicial .'</option>'; 
		
		foreach ( $data as $key => $value) {
			$selected = $value[$idTable ] == $paramBuscar? 'selected': '';
			$selec .= '<option value="'.$value[$idTable].'|'.$value['area'].'" '. $selected .'>'.$value[$valueTable].'</option>'; 
		}
		return $selec .= '</select>'; 
	}

    protected function paisAdd(array $whereIn):array{
		$dataObject = new \App\Models\PaisModel();
		$varShowAllItem = array();
		switch (   $whereIn[0]   ) {
			case 'all':
				$arrayPaises = $dataObject::orderBy('nombre', 'ASC')
				                          ->get();
				break;
			default:
			    $arrayPaises = $dataObject->whereIn('id', $whereIn )
				                          ->orderBy('nombre', 'ASC')
										  ->get();
				break;
		}
		foreach ($arrayPaises as $row){
			   array_push($varShowAllItem,  array('id'     =>    $row['id'],
												  'nombre' =>    $row['nombre'],
												  'area'   =>    $row['area']
		                                    ) 
               );
		}
		return $varShowAllItem;
	}

    protected function selectSexo(Int $buscar, String $accion='Buscar'):Array|String{
		$dataList = array();
		array_push($dataList, 
		    array('item' => '0' ,  'nombre' => 'inactivo'),
		    array('item' => '1' ,  'nombre' => 'Hombre'),
		    array('item' => '2' ,  'nombre' => 'Mujer'),
		    array('item' => '2' ,  'nombre' => 'No especificar'),
		);
        if($accion == 'Buscar' ){
			$result_key = array_search( $buscar , array_column($dataList, 'item'));
			return $dataList[$result_key]['nombre'];
		}if( $accion == 'Mostrar' ){
			return $dataList;
		}
	}

}