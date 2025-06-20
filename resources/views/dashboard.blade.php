<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Buku Tamu</a>
        <div class="d-flex">
            <form id="logoutForm" method="POST">
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    <p>Ini adalah dashboard admin buku tamu.</p>
    <!-- Tambahkan konten dashboard di sini -->
</div>

<script>
    document.getElementById('logoutForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const res = await fetch('/api/logout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': decodeURIComponent(document.cookie.split('; ').find(row => row.startsWith('XSRF-TOKEN='))?.split('=')[1]),
            },
            credentials: 'include'
        });

        if (res.ok) {
            window.location.href = '/login';
        } else {
            alert('Gagal logout');
        }
    });
</script>
</body>
</html>
