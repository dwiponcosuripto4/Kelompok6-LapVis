<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
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

        .logo {
            width: 100px;
            height: auto;
        }

        .navigation {
            display: flex;
            gap: 20px;
        }

        .navigation a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navigation a:hover {
            background-color: #e53e3e;
            color: #fff;
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

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }

        .footer p {
            font-size: 0.8rem;
            color: #888;
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
            <img src="assets/LAPVIS.png" alt="hai">
            <nav class="navigation">
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
            </nav>
        </header>

        <section class="hero">
            <h1>Welcome to Laravel</h1>
            <p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling.</p>
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
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) | Created by <a href="#">Your Company</a></p>
        </footer>
    </div>
</body>
</html>
