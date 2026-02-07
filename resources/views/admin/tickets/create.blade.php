@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Создать обращение</h5>
                    </div>

                    <div class="card-body">

                        {{-- Ошибки валидации --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('tickets.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Тема обращения</label>
                                <input
                                    type="text"
                                    name="subject"
                                    class="form-control"
                                    value="{{ old('subject') }}"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Описание проблемы</label>
                                <textarea
                                    name="message"
                                    class="form-control"
                                    rows="5"
                                    required
                                >{{ old('message') }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                                    Назад
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Отправить
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
