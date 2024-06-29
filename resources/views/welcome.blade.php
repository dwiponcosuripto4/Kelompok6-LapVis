<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMXoXlwccmHJrGFlm4Aa4tL8K3Z2+4crK1j1fdl" crossorigin="anonymous">
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        body.light-mode {
            background-color: #f3f4f6;
            color: #333;
        }

        body.dark-mode {
            background-color: #1a202c;
            color: #cbd5e0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        body.dark-mode .header {
            background-color: #2d3748;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .navigation {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .navigation a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        body.dark-mode .navigation a {
            color: #cbd5e0;
        }

        .navigation a:hover {
            background-color: #e53e3e;
            color: #fff;
        }

        .theme-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .theme-toggle:hover {
            background-color: #e2e8f0;
        }

        body.dark-mode .theme-toggle:hover {
            background-color: #4a5568;
        }

        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 40px;
            background-color: #fff;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        body.dark-mode .hero {
            background-color: #2d3748;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin-bottom: 30px;
        }

        body.dark-mode .hero p {
            color: #a0aec0;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .feature {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease;
        }

        body.dark-mode .feature {
            background-color: #2d3748;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature svg {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
        }

        .feature h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 1rem;
            color: #666;
        }

        body.dark-mode .feature p {
            color: #a0aec0;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }

        body.dark-mode .footer {
            background-color: #2d3748;
        }

        .footer p {
            font-size: 0.8rem;
            color: #888;
        }

        body.dark-mode .footer p {
            color: #a0aec0;
        }

        .footer a {
            color: #e53e3e;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #c53030;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 10px;
                padding: 10px;
            }

            .logo {
                width: 80px;
            }

            .navigation {
                flex-direction: column;
                gap: 10px;
            }

            .navigation a {
                padding: 8px 12px;
            }

            .hero {
                padding: 20px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .feature {
                padding: 15px;
            }

            .feature svg {
                width: 40px;
                height: 40px;
            }

            .footer {
                padding: 10px;
            }

            .footer p {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="{{ asset('assets/LAPVIS.png') }}" alt="hai" width="100" height="100">
            <nav class="navigation">
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
                <div id="theme-toggle" class="theme-toggle">
                    <i id="theme-toggle-dark-icon" class="fas fa-sun hidden"></i>
                    <i id="theme-toggle-light-icon" class="fas fa-moon hidden"></i>
                </div>
            </nav>
        </header>

        <section class="hero">
            <h1>Welcome to LapVis</h1>
            <p>Selamat datang di LapVis! Apakah laptop Anda bermasalah? Tenang, kami siap membantu dengan cepat dan profesional. Tim teknisi kami yang berpengalaman menangani perbaikan hardware, optimasi software, dan penggantian komponen dengan suku cadang asli. Di LapVis, kami menjamin kualitas dan memberikan garansi pada setiap layanan. Serahkan laptop Anda kepada kami, dan nikmati performa terbaiknya kembali!</p>
        </section>

        {{-- <section class="features">
            <a href="https://laravel.com/docs" class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">
                    <path d="M3 9a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V9z"></path>
                    <path d="M9 2L9 9 12 9"></path>
                </svg>
                <h2>Documentation</h2>
                <p>Laravel has wonderful documentation covering every aspect of the framework.</p>
            </a>

            <a href="https://laracasts.com" class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                </svg>
                <h2>Laracasts</h2>
                <p>Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development.</p>
            </a>

            <a href="https://laravel-news.com" class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rss">
                    <path d="M4 11a9 9 0 0 1 9 9"></path>
                    <path d="M4 4a16 16 0 0 1 16 16"></path>
                    <circle cx="5" cy="19" r="1"></circle>
                </svg>
                <h2>Laravel News</h2>
                <p>Laravel News is a community driven portal and newsletter aggregating all of the latest news in the Laravel ecosystem.</p>
            </a>
        </section> --}}

        <footer class="footer">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) | Created by <a href="#">LapVis Company</a></p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const themeToggleBtn = document.getElementById("theme-toggle");
            const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
            const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

            function updateIcons() {
                if (document.body.classList.contains('dark-mode')) {
                    themeToggleLightIcon.classList.remove("hidden");
                    themeToggleDarkIcon.classList.add("hidden");
                } else {
                    themeToggleDarkIcon.classList.remove("hidden");
                    themeToggleLightIcon.classList.add("hidden");
                }
            }

            // Check for theme preference at the beginning
            if (localStorage.getItem("color-theme") === "dark" || 
                (!localStorage.getItem("color-theme") && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
                document.body.classList.add('dark-mode');
                localStorage.setItem("color-theme", "dark");
            } else {
                document.body.classList.add('light-mode');
                localStorage.setItem("color-theme", "light");
            }

            updateIcons();

            themeToggleBtn.addEventListener("click", function () {
                document.body.classList.toggle('dark-mode');
                document.body.classList.toggle('light-mode');
                if (document.body.classList.contains('dark-mode')) {
                    localStorage.setItem("color-theme", "dark");
                } else {
                    localStorage.setItem("color-theme", "light");
                }
                updateIcons();
            });
        });
    </script>
</body>
</html>
