<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Siswa;

class AkunAktifMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $siswa;
    public $password;
    public $tanggalAktif;

    /**
     * Create a new message instance.
     */
    public function __construct(Siswa $siswa, string $password)
    {
        $this->siswa = $siswa;
        $this->password = $password;
        $this->tanggalAktif = now()->format('d-m-Y H:i:s');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Aktivasi Akun SPMB 2025',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.akun-aktif',
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
} 