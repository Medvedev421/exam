<form method="post" action="{{ route('profile.destroy') }}"
      onsubmit="return confirm('Вы уверены, что хотите удалить аккаунт?')">
    @csrf
    @method('delete')

    <div class="mb-3">
        <label class="form-label">Подтвердите пароль</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-danger">
        Удалить аккаунт
    </button>
</form>
