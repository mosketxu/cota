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

        // return $this->view('facturacion.mail')
        //     ->subject('Factura Suma Apoyo Empresarial:')
        //     ->attach('storage/facturas/21/06/Fra_Suma_21_00002_Alektu.pdf');
        $r='storage/'.$this->factura->rutafichero;

        return $this->view('facturacion.mail')
            ->subject('Factura Suma Apoyo Empresarial:' . $this->factura->factura5)
            ->attach($r);
    }
}
