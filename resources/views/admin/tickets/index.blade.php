@extends('layouts.app')

@section('title', 'Мои обращения')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Мои обращения</h4>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                Создать обращение
            </a>
        </div>

        @if($tickets->isEmpty())
            <div class="alert alert-secondary">
                У вас пока нет обращений
            </div>
        @else
            <div class="list-group">
                @foreach($tickets as $ticket)
                    <a href="{{ route('tickets.show', $ticket) }}"
                       class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $ticket->title }}</strong>
                            <span class="badge bg-secondary">
                            {{ $ticket->status_label }}
                        </span>
                        </div>
                        <small class="text-muted">
                            {{ $ticket->created_at->format('d.m.Y H:i') }}
                        </small>
                    </a>
                @endforeach
            </div>
        @endif

    </div>
@endsection
