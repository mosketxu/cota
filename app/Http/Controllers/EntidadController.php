<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use App\Models\FacturacionConcepto;
use Illuminate\Http\Request;


class EntidadController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entidad.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entidad $entidad)
    {
        return view('entidad.edit',compact('entidad'));
    }


    public function pus(Entidad $entidad)
    {
        return view('entidad.pus',compact('entidad'));
    }

    public function facturacionconceptos(Entidad $entidad)
    {
        return view('entidad.facturacionconceptos',compact('entidad'));
    }

    public function generarfacturacion(Entidad $entidad)
    {
        $conceptos=FacturacionConcepto::find($entidad->id);
        dd($conceptos);
        foreach ($conceptos as $concepto){
            dd('sd');
        }

        return view('entidad.facturacionconceptos',compact('entidad'));
    }

    public function contactos(Entidad $entidad)
    {
        return view('entidad.contactos',compact('entidad'));
    }

    public function createcontacto($contactoId)
    {
        $contacto=Entidad::find($contactoId);
        return view('entidad.createcontacto',compact('contacto'));
    }



}
