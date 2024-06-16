<form action="{{ route('auth.auth') }}", method="post">
@csrf
    Email:
    <input type="email" name="email">
    Password:
    <input type="password" name="password">
    <button type="submit">Логин</button>
</form>
