@extends('layouts.app')

@section('title', 'Обращение #' . $ticket->id)

@section('content')
    <div class="container mt-4">

        <h2 class="mb-3">Обращение #{{ $ticket->id }}</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Пользователь:</strong> {{ $ticket->user->email }}</p>
                <p><strong>Тема:</strong> {{ $ticket->subject }}</p>
                <p><strong>Статус:</strong> {{ $ticket->status }}</p>
                <hr>
                <p>{{ $ticket->message }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.tickets.status', $ticket) }}" class="d-flex gap-2">
            @csrf
            @method('PATCH')

            <select name="status" class="form-select w-auto">
                <option value="open" @selected($ticket->status === 'open')>open</option>
                <option value="closed" @selected($ticket->status === 'closed')>closed</option>
            </select>

            <button class="btn btn-primary">
                Сохранить
            </button>
        </form>

        <a href="{{ route('admin.tickets.index') }}" class="btn btn-link mt-3">
            ← Назад
        </a>

    </div>
@endsection
