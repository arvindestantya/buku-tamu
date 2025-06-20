<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Buku Tamu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="mb-4 text-center">Login Admin</h4>
            <div id="alertBox" class="alert alert-danger d-none" role="alert"></div>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
    async function getCookieValue(name) {
        const cookie = document.cookie.split('; ').find(row => row.startsWith(name + '='));
        return cookie ? decodeURIComponent(cookie.split('=')[1]) : null;
    }

    document.getElementById('loginForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const alertBox = document.getElementById('alertBox');
        alertBox.classList.add('d-none');

        try {
            // Langkah penting!
            await fetch('/sanctum/csrf-cookie', { credentials: 'include' });

            const res = await fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-XSRF-TOKEN': await getCookieValue('XSRF-TOKEN'),
                },
                credentials: 'include',
                body: JSON.stringify({
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value
                })
            });

            const data = await res.json();

            if (!res.ok) {
                alertBox.textContent = data.message || 'Login gagal';
                alertBox.classList.remove('d-none');
                return;
            }

            window.location.href = '/dashboard';
        } catch (err) {
            alertBox.textContent = 'Kesalahan jaringan atau CSRF';
            alertBox.classList.remove('d-none');
        }
    });
</script>

</body>
</html>
