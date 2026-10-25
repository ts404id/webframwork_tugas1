<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta
        name="description"
        content="Meet the members and explore their interests and roles in {{ $team['name'] }}."
    >
    <meta name="theme-color" content="#141212">

    <title>@yield('title', $team['name'])</title>

    <link
        rel="icon"
        href="{{ asset('favicon.svg') }}"
        type="image/svg+xml"
    >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <a class="skip" href="#main">Skip navigation</a>

    <header class="header">
        <div class="wrap nav">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-icon" aria-hidden="true">
                    BA.<span></span>
                </span>

                <span>
                    {{ $team['name'] }}
                    <small>CLUELESS, BUT MAKE IT CONFIDENT</small>
                </span>
            </a>

            <nav aria-label="Main navigation">
                <a
                    href="{{ route('home') }}"
                    @if(request()->routeIs('home'))
                        aria-current="page"
                    @endif
                >
                    Home
                </a>

                <a href="{{ route('home') }}#tentang">
                    About
                </a>

                <a class="nav-cta" href="{{ route('home') }}#anggota">
                    Team
                    <span aria-hidden="true">↗</span>
                </a>
            </nav>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="wrap footer">
        <a class="footer-brand" href="{{ route('home') }}">
            {{ $team['name'] }}<span>.</span>
        </a>

        <p>
            © {{ date('Y') }} {{ $team['copyright'] }}.
            All rights reserved.
        </p>

        <a href="#main">Back to top ↑</a>
    </footer>
</body>
</html>