<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use Illuminate\Support\Facades\Log;

class LogTicketCreated
{
    public function handle(TicketCreated $event): void
    {
        Log::info('Сработал Event TicketCreated', [
            'ticket_id' => $event->ticket->id,
            'user_id'   => $event->ticket->user_id,
            'subject'   => $event->ticket->subject,
        ]);
    }
}
