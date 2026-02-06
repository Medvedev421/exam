@extends('layouts.app')

@section('title', 'Новое обращение')

@section('content')
    <div class="container mt-4">

        <h2 class="mb-4">Новое обращение</h2>

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('tickets.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Тема обращения</label>
                        <input type="text"
                               name="subject"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Сообщение</label>
                        <textarea name="message"
                                  class="form-control"
                                  rows="5"
                                  required></textarea>
                    </div>

                    <button class="btn btn-success">
                        Отправить
                    </button>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>

            </div>
        </div>

    </div>
@endsection
