<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     */

     public $name;
     public $email;
     public $subject;
     public $description;

    public function __construct($name,$email,$subject,$description)
    {
        $this->name=$name;
        $this->email=$email;
        $this->subject=$subject;
        $this->description=$description;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    public function build()  {
        return $this->from($this->email,$this->name)
        ->subject($this->subject)
        ->view('emails.contact')
        ->with(
            [

                'name'=>$this->name,
                'email'=>$this->email,
                'subject'=>$this->subject,
                'description'=>$this->description,
            ]
            );
    }
}
