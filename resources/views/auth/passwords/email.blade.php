<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Send Password Reset Link</button>
</form>