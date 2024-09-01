<?php

namespace Modules\Settings\Notifications;

use App\Models\Company\CompanyInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class CompanyInvitationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(CompanyInvitation $notifiable): MailMessage
    {
        $companyName = current_company()->name;
        $invitationUrl = route('company.invitations.accept', ['token' => $notifiable->token, 'subdomain' => current_company()->domain_name]);

        return (new MailMessage)
                    ->subject("Invitation to join $companyName")
                    ->greeting("Hello " . Auth::user()->name . " !")
                    ->line("You have been invited by " . Auth::user()->name . " to join the team at $companyName.")
                    ->action('Accept Invitation', $invitationUrl)
                    ->line('This invitation will expire on ' . $notifiable->expire_at->format('F j, Y') . '.')
                    ->line('If you did not expect this invitation, please disregard this email.')
                    ->salutation('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
