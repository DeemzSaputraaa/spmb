<?php

namespace App\Mail;

use App\Models\Siswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SiswaAkunAktif extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $siswa;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct(Siswa $siswa, string $password)
    {
        $this->siswa = $siswa;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Akun Pendaftaran Siswa Baru Telah Aktif - ' . config('app.name'),
            from: config('mail.from.address'),
            to: [$this->siswa->email]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.siswa-akun-aktif',
            with: [
                'siswa' => $this->siswa,
                'email' => $this->siswa->email,
                'password' => $this->password,
            ]
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
