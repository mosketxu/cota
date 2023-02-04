<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FacturasListaExport implements FromCollection, WithHeadings{

    public $lista;

    function __construct($lista){
        $this->lista=$lista;
    }

    public function headings(): array{
        return [
            ['Data Factura','Nº Factura','Client','Projecte','Base','Exento','Iva','Total']
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return $this->lista;
    }
}
