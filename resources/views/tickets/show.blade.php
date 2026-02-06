@extends('layouts.app')

@section('title', 'Обращение #' . $ticket->id)

@section('content')
    <div class="container mt-4">

        <h2 class="mb-3">Обращение #{{ $ticket->id }}</h2>

        <div class="card">
            <div class="card-body">
                <p><strong>Тема:</strong> {{ $ticket->subject }}</p>
                <p><strong>Статус:</strong> {{ $ticket->status }}</p>
                <hr>
                <p>{{ $ticket->message }}</p>
            </div>
        </div>

        <a href="{{ route('tickets.index') }}" class="btn btn-link mt-3">
            ← Назад
        </a>

    </div>
@endsection
