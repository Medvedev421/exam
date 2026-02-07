@extends('layouts.app')

@section('title', 'Все обращения')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Все обращения</h2>
        </div>

        @if($tickets->isEmpty())
            <div class="alert alert-info">
                Обращений пока нет
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Тема</th>
                        <th>Email пользователя</th>
                        <th>Статус</th>
                        <th>Создано</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->user->email }}</td>
                            <td>
                                <span class="badge
                                    @if($ticket->status === 'new') bg-primary
                                    @elseif($ticket->status === 'in_work') bg-warning
                                    @else bg-success
                                    @endif
                                ">
                                    {{ $ticket->status_label }}
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
        @endif

    </div>
@endsection
