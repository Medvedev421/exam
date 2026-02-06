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
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'title'   => $data['title'],
            'message' => $data['message'],
            'status'  => 'open',
        ]);

        // 🔥 EVENT
        event(new TicketCreated($ticket));

        return redirect()->route('tickets.index')
            ->with('success', 'Обращение создано');
    }

    public function show(Ticket $ticket)
    {
        abort_if($ticket->user_id !== Auth::id(), 403);

        return view('tickets.show', compact('ticket'));
    }
}
