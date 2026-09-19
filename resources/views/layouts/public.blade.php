<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buy Argumentative Essay Online | Argumentative Essay Writing Service')</title>
    <meta name="description" content="@yield('meta_description', 'Buy argumentative essay help from experienced writers. Custom research, original writing, secure ordering and professional support.')">
    @hasSection('robots')
        <meta name="robots" content="@yield('robots')">
    @endif
    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @endif
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    @hasSection('jsonld')
        <script type="application/ld+json">
            @yield('jsonld')
        </script>
    @endif
    <style>
        :root {
            --blue: #1d7bff;
            --dark: #14141a;
            --muted: #5c5c6a;
            --bg: #f7f8fb;
            --accent: #f7ad26;
            --card: #ffffff;
            --border: #e6e8f0;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Manrope', 'Poppins', sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
            line-height: 1.6;
        }
        a { color: inherit; text-decoration: none; }
        header {
            position: sticky;
            top: 0;
            z-index: 10;
            background: rgba(247,248,251,0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(230,232,240,0.6);
        }
        .nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: -0.2px;
            white-space: nowrap;
        }
        .brand .mark {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: linear-gradient(135deg, #1d7bff, #25c7ff);
            display: grid;
            place-items: center;
            color: white;
            font-size: 18px;
            font-weight: 800;
            flex: none;
            box-shadow: 0 12px 35px rgba(29,123,255,0.25);
        }
        .brand .text strong { color: var(--blue); }
        .menu {
            display: flex;
            align-items: center;
            gap: 22px;
            font-weight: 600;
            color: #202028;
        }
        .menu a {
            position: relative;
            padding: 6px 0;
            font-size: 15px;
            white-space: nowrap;
        }
        .menu a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            height: 3px;
            width: 0;
            background: var(--blue);
            border-radius: 12px;
            transition: width .18s ease;
        }
        .menu a:hover::after,
        .menu a.active::after { width: 18px; }
        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn {
            border-radius: 10px;
            padding: 11px 16px;
            font-weight: 700;
            border: 1px solid transparent;
            transition: transform .15s ease, box-shadow .15s ease, border .15s ease;
            font-size: 14px;
            white-space: nowrap;
        }
        .btn:hover { transform: translateY(-1px); }
        .btn-ghost {
            background: #ffffff;
            border-color: var(--border);
            color: var(--dark);
        }
        .btn-primary {
            background: linear-gradient(135deg, #1d7bff, #25c7ff);
            color: white;
            box-shadow: 0 12px 30px rgba(29,123,255,0.35);
        }
        .page-main { max-width: 1200px; margin: 0 auto; padding: 40px 24px 70px; }
        .page-head { margin-bottom: 30px; }
        .breadcrumbs { font-size: 14px; color: var(--muted); font-weight: 600; margin-bottom: 14px; display: flex; flex-wrap: wrap; gap: 6px; }
        .breadcrumbs a { color: var(--blue); }
        .page-head h1 {
            font-size: clamp(32px, 3.4vw, 46px);
            line-height: 1.12;
            letter-spacing: -0.6px;
            margin: 0 0 12px;
            font-weight: 800;
        }
        .page-head .lead { color: var(--muted); font-size: 18px; max-width: 760px; margin: 0; }
        .prose { background: #fff; border: 1px solid var(--border); border-radius: 18px; padding: 34px; box-shadow: 0 18px 40px rgba(17,24,39,0.05); }
        .prose h2 { font-size: 26px; letter-spacing: -0.3px; margin: 30px 0 12px; line-height: 1.22; }
        .prose h2:first-child { margin-top: 0; }
        .prose h3 { font-size: 21px; letter-spacing: -0.2px; margin: 24px 0 10px; line-height: 1.25; }
        .prose p { margin: 0 0 14px; color: #2b2f3a; }
        .prose ul, .prose ol { margin: 0 0 16px 24px; color: #2b2f3a; }
        .prose li { margin-bottom: 7px; }
        .prose a { color: var(--blue); font-weight: 700; }
        .prose a:hover { text-decoration: underline; }
        .prose table { width: 100%; border-collapse: collapse; margin: 16px 0; font-size: 15px; }
        .prose th, .prose td { border: 1px solid var(--border); padding: 10px 12px; text-align: left; }
        .prose th { background: #f4f7ff; font-weight: 800; }
        .cta-panel {
            margin-top: 34px;
            background: linear-gradient(135deg, #1d7bff, #25c7ff);
            border-radius: 18px;
            padding: 30px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }
        .cta-panel h2 { margin: 0 0 6px; color: #fff; font-size: 24px; }
        .cta-panel p { margin: 0; opacity: 0.95; }
        .cta-panel .btn { background: #fff; color: #1d4ed8; }
        footer {
            background: #14141a;
            color: #c7c8d1;
            margin-top: 40px;
        }
        .footer-inner { max-width: 1200px; margin: 0 auto; padding: 50px 24px 34px; }
        .footer-grid { display: grid; grid-template-columns: 1.4fr repeat(3, 1fr); gap: 30px; }
        .footer-brand { font-size: 18px; font-weight: 800; color: #fff; display: flex; align-items: center; gap: 10px; }
        .footer-brand strong { color: #60a5fa; }
        .footer-desc { color: #9a9ba8; font-size: 14px; margin-top: 14px; max-width: 300px; line-height: 1.6; }
        .footer-col h4 { color: #fff; font-size: 14px; margin: 0 0 14px; letter-spacing: 0.4px; text-transform: uppercase; }
        .footer-col a { display: block; color: #c7c8d1; font-size: 14px; padding: 5px 0; }
        .footer-col a:hover { color: #60a5fa; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.08); margin-top: 34px; padding-top: 20px; display: flex; justify-content: space-between; gap: 16px; flex-wrap: wrap; font-size: 13px; color: #8b8c98; }
        @media (max-width: 900px) {
            header { position: static; }
            .menu { display: none; }
            .prose { padding: 24px; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 560px) {
            .footer-grid { grid-template-columns: 1fr; }
            .actions .btn-ghost { display: none; }
        }
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a class="brand" href="{{ url('/') }}">
            <span class="mark">✍</span>
            <span class="text">Buy <strong>Argumentative Essay</strong></span>
        </a>
        <nav class="menu" aria-label="Primary">
            <a href="{{ url('/') }}" class="@yield('nav_home')">Home</a>
            <a href="{{ url('/argumentative-essay-writing-service') }}" class="@yield('nav_service')">Writing Service</a>
            <a href="{{ url('/how-it-works') }}" class="@yield('nav_how')">How It Works</a>
            <a href="{{ url('/pricing') }}" class="@yield('nav_pricing')">Pricing</a>
            <a href="{{ url('/writers') }}" class="@yield('nav_writers')">Writers</a>
        </nav>
        <div class="actions">
            <a class="btn btn-ghost" href="{{ route('order', ['tab' => 'existing']) }}">Sign In</a>
            <a class="btn btn-primary" href="{{ route('order', ['tab' => 'new']) }}">Order Now</a>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="footer-inner">
        <div class="footer-grid">
            <div>
                <div class="footer-brand"><span>✍</span><span>Buy <strong>Argumentative Essay</strong></span></div>
                <p class="footer-desc">Custom argumentative essay writing support, research and editing help for students at every academic level.</p>
            </div>
            <div class="footer-col">
                <h4>Services</h4>
                <a href="{{ url('/argumentative-essay-writing-service') }}">Argumentative Essay Writing Service</a>
                <a href="{{ url('/argumentative-essay-writer') }}">Argumentative Essay Writer</a>
                <a href="{{ url('/write-my-argumentative-essay') }}">Write My Argumentative Essay</a>
                <a href="{{ url('/argumentative-essay-help') }}">Argumentative Essay Help</a>
                <a href="{{ url('/argumentative-essay-editing') }}">Argumentative Essay Editing</a>
                <a href="{{ url('/argumentative-essay-proofreading') }}">Argumentative Essay Proofreading</a>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <a href="{{ url('/about-us') }}">About Us</a>
                <a href="{{ url('/how-it-works') }}">How It Works</a>
                <a href="{{ url('/pricing') }}">Pricing</a>
                <a href="{{ url('/reviews') }}">Reviews</a>
                <a href="{{ url('/guarantees') }}">Guarantees</a>
                <a href="{{ url('/contact-us') }}">Contact Us</a>
            </div>
            <div class="footer-col">
                <h4>Policies</h4>
                <a href="{{ url('/revision-policy') }}">Revision Policy</a>
                <a href="{{ url('/refund-policy') }}">Refund Policy</a>
                <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                <a href="{{ url('/terms-and-conditions') }}">Terms &amp; Conditions</a>
                <a href="{{ url('/academic-integrity') }}">Academic Integrity</a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Buy Argumentative Essay. All rights reserved.</span>
            <span>Model papers and writing support for research and reference.</span>
        </div>
    </div>
</footer>
</body>
</html>
