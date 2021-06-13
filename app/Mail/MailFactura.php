<?php

namespace App\Mail;

use App\Models\Facturacion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFactura extends Mailable
{
    use Queueable, SerializesModels;


    public $factura;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Facturacion $factura)
    {
        $this->factura=$factura;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $a=$factura->serie;
        dd($a);
        $m=$this->fechafactura->format('m');
        $ruta='storage/facturas/'.$a.'/'.$m.'/';
        $fileName=$ruta.'Fra_Suma_'.$this->serie.'_'.substr ( $this->numfactura ,-5 ).'_'.substr ( $this->entidad ,0,10 ).'.pdf' ;
        dd($fileName);

        return $this->view('facturacion.mail')
            ->subject('Factura Suma Apoyo Empresarial:'.$factura->numfactura)
            ->attach('storage/facturas/21/06/Fra_Suma_.pdf');
    }
}
