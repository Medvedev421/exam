<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Events\TicketCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $data['subject'],
            'message' => $data['message'],
            'status'  => 'new',
        ]);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Обращение создано');
    }

    public function show(Ticket $ticket)
    {
        abort_if($ticket->user_id !== Auth::id(), 403);

        return view('tickets.show', compact('ticket'));
    }
}
