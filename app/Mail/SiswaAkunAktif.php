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
    public $email;
    public $password;

    public function __construct(Siswa $siswa, string $password)
    {
        $this->siswa = $siswa;
        $this->email = $siswa->email;
        $this->password = $password;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Akun Pendaftaran Siswa Baru Telah Aktif - ' . config('app.name'),
            to: $this->siswa->email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.siswa-akun-aktif',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
