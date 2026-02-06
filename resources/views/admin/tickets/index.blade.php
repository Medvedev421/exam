@extends('layouts.app')

@section('title', 'Админка — обращения')

@section('content')
    <div class="container mt-4">

        <h2 class="mb-4">Все обращения</h2>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Тема</th>
                    <th>Статус</th>
                    <th>Создано</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->user->email }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>
                        <span class="badge {{ $ticket->status === 'open' ? 'bg-primary' : 'bg-success' }}">
                            {{ $ticket->status }}
                        </span>
                        </td>
                        <td>{{ $ticket->created_at->format('d.m.Y') }}</td>
                        <td>
                            <a href="{{ route('admin.tickets.show', $ticket) }}"
                               class="btn btn-sm btn-outline-secondary">
                                Открыть
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
