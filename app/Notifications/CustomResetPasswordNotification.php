<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    public $token; // 🧩 Tambahkan properti token

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token; // 🧩 Simpan token ke properti
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('🔒 Reset Password Anda - TK Harapan Ibu')
            ->greeting('Halo, ' . ($notifiable->name ?? 'Pengguna') . ' 👋')
            ->line('Kami menerima permintaan untuk mereset kata sandi akun Anda.')
            ->action('Reset Password Sekarang', $resetUrl)
            ->line('Link reset password ini hanya berlaku selama 60 menit.')
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.')
            ->salutation('Salam hangat, 🌼 TK Harapan Ibu');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
