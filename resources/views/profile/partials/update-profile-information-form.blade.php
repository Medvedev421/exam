<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label class="form-label">Имя</label>
        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $user->name) }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $user->email) }}"
            required
        >
    </div>

    <button class="btn btn-primary">
        Сохранить
    </button>
</form>
