<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('user')
            ->latest()
            ->get();

        return view('admin.tickets.index', compact('tickets'));
    }

    public function deleted()
    {
        $tickets = Ticket::onlyTrashed()
            ->with('user')
            ->latest('deleted_at')
            ->get();

        return view('admin.tickets.deleted', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_work,done',
        ]);

        $ticket->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Статус обновлён');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()
            ->route('admin.tickets.index')
            ->with('success', 'Обращение удалено');
    }
}
