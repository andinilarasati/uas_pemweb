<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tempat Wisata</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">WisataKu</div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="content">
        {{ $slot }}
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} WisataKu. All Rights Reserved.</p>
    </footer>
</body>
</html>
