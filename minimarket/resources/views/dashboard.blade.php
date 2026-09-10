<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Navbar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background-color: white;
        }

        nav h2 {
            color: #176b4d;
        }

        nav ul {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        nav a {
            text-decoration: none;
            color: #333;
        }

        nav a:hover {
            color: #176b4d;
        }

        /* Hero */
        .hero {
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .hero-content {
            max-width: 700px;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #176b4d;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #176b4d;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .btn:hover {
            background-color: #0f4d37;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #176b4d;
            color: white;
        }

        /* Responsive */
        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            .hero h1 {
                font-size: 35px;
            }

            nav ul {
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav>
        <h2>MyWebsite</h2>

        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">

            <h1>
                Selamat Datang di
                <span>MyWebsite</span>
            </h1>

            <p>
                Website sederhana yang dibuat menggunakan
                HTML dan CSS. Cocok untuk belajar membuat
                landing page dari dasar.
            </p>

            <a href="#" class="btn">
                Mulai Sekarang
            </a>

        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 MyWebsite. All Rights Reserved.</p>
    </footer>

</body>
</html>