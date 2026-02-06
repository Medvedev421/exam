<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    public function created(Ticket $ticket): void
    {
        \Log::info('Создано новое обращение', [
            'ticket_id' => $ticket->id,
            'user_id' => $ticket->user_id,
        ]);
    }

    public function updated(Ticket $ticket): void
    {
        //
    }

    public function deleted(Ticket $ticket): void
    {
        //
    }

    public function restored(Ticket $ticket): void
    {
        //
    }

    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
