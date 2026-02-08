@extends('layouts.app')

@section('title', 'Удалённые обращения')

@section('content')
    <div class="container mt-4">

        <h2 class="mb-3">Удалённые обращения</h2>

        <a href="{{ route('admin.tickets.index') }}" class="btn btn-link mb-3">
            ← Назад
        </a>

        @if($tickets->isEmpty())
            <div class="alert alert-info">
                Удалённых тикетов нет
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Тема</th>
                        <th>Email</th>
                        <th>Статус</th>
                        <th>Удалён</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr class="table-danger">
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->user->email }}</td>
                            <td>{{ $ticket->status_label }}</td>
                            <td>{{ $ticket->deleted_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
