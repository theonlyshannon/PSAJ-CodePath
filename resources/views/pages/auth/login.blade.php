<x-layouts.auth title="Login">
    <div class="login-container">
        <h2>Codepath</h2>
        <p>Nice To See You Again</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label">Login</label>
                <input type="text" class="form-control" name="email" placeholder="Enter your login">
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                        <i class="bi bi-eye-slash toggle-password-icon"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign Up Here.</a></p>
    </div>

    @push('script-app')
        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.querySelector('.toggle-password-icon');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                }
            }
        </script>
    @endpush
</x-layouts.auth>
