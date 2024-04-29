<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>