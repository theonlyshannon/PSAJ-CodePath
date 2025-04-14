<x-layouts.register title="Daftar Akun">

    <div class="login-container">
        <h2>Codepath</h2>
        <p>Nice To See You Again</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon Anda" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi Anda" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                        <i class="bi bi-eye-slash" id="toggle-password-icon"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3 form-check text-start">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-login">Daftar</button>
        </form>
        <p class="mt-3">Have An Account? <a href="{{ route('login') }}" class="text-decoration-none">Login Here</a></p>
    </div>

    @push('script-app')
        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.getElementById('toggle-password-icon');
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
</x-layouts.register>
