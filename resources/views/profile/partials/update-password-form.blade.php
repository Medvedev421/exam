<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="mb-3">
        <label class="form-label">Текущий пароль</label>
        <input type="password" name="current_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Новый пароль</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Подтверждение пароля</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button class="btn btn-warning">
        Изменить пароль
    </button>
</form>
