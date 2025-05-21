<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StokBarang - Aplikasi Pengelolaan Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            /* background: url('/assets/images/gudang.jpg') no-repeat center center fixed;
            background-size: cover; */
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .hero {
            padding: 100px 20px;
            text-align: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <x-application-logo class="h-8 w-auto text-dark" />
                <span class="fw-bold text-dark">StokBarang</span>
            </a>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
    </nav>

    <main class="flex-grow-1 d-flex align-items-center justify-content-center fade-in">
        <section class="hero text-center">
            <div class="container">
                <h1 class="display-5 fw-bold">Selamat Datang di StokBarang</h1>
                <p class="lead">Aplikasi Pengelolaan Stok Barang yang Mudah dan Efisien.</p>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Masuk Sekarang</a>
            </div>
        </section>
    </main>


    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} StokBarang. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
