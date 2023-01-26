<?php

/**  Devuelve el mes de una fecha menos su ciclo en texto en funcion del idioma. */

if(!function_exists('mes')){
    function mes($fecha,$ciclo,$idioma): string
    {
        $mes=date("m", strtotime($fecha))-$ciclo;
        switch ($mes) {
            case '0':
                return $idioma=='ES' ? 'Diciembre' : ($idioma=='CT' ? 'Decembre': 'December');
                break;
            case '01':
                return $idioma=='ES' ? 'Enero' : ($idioma=='CT' ? 'Gener': 'January');
                break;
            case '02':
                return $idioma=='ES' ? 'Febrero' : ($idioma=='CT' ? 'Febrer':'February');
                break;
            case '03':
                return $idioma=='ES' ? 'Marzo' : ($idioma=='CT' ? 'Març': 'March');
                break;
            case '04':
                return $idioma=='ES' ? 'Abril' : ($idioma=='CT' ? 'Abril': 'April');
                break;
            case '05':
                return $idioma=='ES' ? 'Mayo' : ($idioma=='CT'? 'Maig' : 'May');
                break;
            case '06':
                return $idioma=='ES' ? 'Junio' :  ($idioma=='CT' ? 'Juny' : 'June') ;
                break;
            case '07':
                return $idioma=='ES' ? 'Julio' :  ($idioma=='CT' ? 'Juliol' :'July');
                break;
            case '08':
                return $idioma=='ES' ? 'Agosto' :  ($idioma=='CT' ? 'Agost' :'August');
                break;
            case '09':
                return $idioma=='ES' ? 'Septiembre' : ($idioma=='CT' ? 'Setembre' : 'September');
                break;
            case '10':
                return $idioma=='ES' ? 'Octubre' : ($idioma=='CT' ? 'Octobre' : 'October');
                break;
            case '11':
                return $idioma=='ES' ? 'Noviembre' : ($idioma=='CT' ? 'Novembre' : 'November');
                break;
            case '12':
                return $idioma=='ES' ? 'Diciembre' : ($idioma=='CT' ? 'Decembre' : 'December');
                break;
            default:
                return '';
                break;
        }
    }
}


    /**  Devuelve el trimestre de una fecha menos su ciclo en texto en funcion del idioma. */
if (!function_exists('trimestre')) {
    function trimestre($fecha, $ciclo, $idioma): string
    {
        $trimestre=(floor((date("m", strtotime($fecha))-1) / 3)+1)-$ciclo;
        switch ($trimestre) {
            case '0':
                return $idioma=='ES' ? 'T4' : 'Q4';
                break;
            case '01':
                return $idioma=='ES' ? 'T1' : 'Q1';
                break;
            case '02':
                return $idioma=='ES' ? 'T2' : 'Q2';
                break;
            case '03':
                return $idioma=='ES' ? 'T3' : 'Q3';
                break;
            case '04':
                return $idioma=='ES' ? 'T4' : 'Q4';
                break;
            default:
                return '';
                break;
        }
    }
}

