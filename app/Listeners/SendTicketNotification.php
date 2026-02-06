<?php

namespace App\Listeners;

use App\Events\TicketCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTicketNotification implements ShouldQueue
{
    public function handle(TicketCreated $event): void
    {
        \Log::info('Event: TicketCreated', [
            'ticket_id' => $event->ticket->id,
        ]);
    }
}
