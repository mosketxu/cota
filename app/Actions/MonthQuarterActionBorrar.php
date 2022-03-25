<?php

namespace App\Actions;

class MonthQuarterAction {

    /**  Devuelve el mes de una fecha menos su ciclo en texto en funcion del idioma. */
    // public function mes($fecha,$ciclo,$idioma): string
    // {
    //     $mes=date("m", strtotime($fecha))-$ciclo;
    //     switch ($mes) {
    //         case '0':
    //             return $idioma=='ES' ? 'Diciembre' : 'December';
    //             break;
    //         case '01':
    //             return $idioma=='ES' ? 'Enero' : 'January';
    //             break;
    //         case '02':
    //             return $idioma=='ES' ? 'Febrero' : 'February';
    //             break;
    //         case '03':
    //             return $idioma=='ES' ? 'Marzo' : 'March';
    //             break;
    //         case '04':
    //             return $idioma=='ES' ? 'Abril' : 'April';
    //             break;
    //         case '05':
    //             return $idioma=='ES' ? 'Mayo' : 'May';
    //             break;
    //         case '06':
    //             return $idioma=='ES' ? 'Junio' : 'June';
    //             break;
    //         case '07':
    //             return $idioma=='ES' ? 'Julio' : 'July';
    //             break;
    //         case '08':
    //             return $idioma=='ES' ? 'Agosto' : 'August';
    //             break;
    //         case '09':
    //             return $idioma=='ES' ? 'Septiembre' : 'September';
    //             break;
    //         case '10':
    //             return $idioma=='ES' ? 'October' : 'Octubre';
    //             break;
    //         case '11':
    //             return $idioma=='ES' ? 'Noviembre' : 'November';
    //             break;
    //         case '12':
    //             return $idioma=='ES' ? 'Diciembre' : 'December';
    //             break;
    //         default:
    //             return '';
    //             break;
    //     }
    // }

    /**  Devuelve el trimestre de una fecha menos su ciclo en texto en funcion del idioma. */

    public function trimestre($fecha,$ciclo,$idioma): string
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
