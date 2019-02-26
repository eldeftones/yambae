<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BillCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bill)
    {
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = "MON CONTENU";

        return $this
            ->from('espaceyambae@gmail.com')
            ->subject('Votre facture')
            ->view('mails.bill_student')
            ->with([
                'bill' => $this->bill,
            ]);
    }
}
