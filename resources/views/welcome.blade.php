<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $minPrice = $minPrice ?? 12.60;
        $minPriceFormatted = number_format((float) $minPrice, 2, '.', '');
        $titleTag = 'Buy Argumentative Essay Online | Expert Writers From $' . $minPriceFormatted;
    @endphp
    <title>{{ $titleTag }}</title>
    <meta name="description" content="Buy argumentative essay help from experienced writers. Get custom research, original writing, secure ordering and professional support.">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script type="application/ld+json">
    @php
        $baseUrl = rtrim(url('/'), '/');
        $schema = [
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'Buy Argumentative Essay',
                'url' => $baseUrl,
                'logo' => $baseUrl . '/favicon.ico',
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Buy Argumentative Essay',
                'url' => $baseUrl,
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => 'Argumentative Essay Writing Service',
                'serviceType' => 'Argumentative essay writing and editing support',
                'description' => 'Custom argumentative essay writing, editing and proofreading support for students.',
                'provider' => ['@type' => 'Organization', 'name' => 'Buy Argumentative Essay', 'url' => $baseUrl],
                'url' => $baseUrl,
                'areaServed' => ['@type' => 'Country', 'name' => 'Worldwide'],
                'offers' => [
                    '@type' => 'Offer',
                    'priceCurrency' => 'USD',
                    'price' => $minPriceFormatted,
                    'description' => 'Starting price per page',
                ],
            ],
        ];

        $homeFaqs = [
            ['q' => 'Can I buy an argumentative essay online?', 'a' => 'Yes. Choose your academic level and deadline, describe your topic and instructions, and a writer prepares a custom argumentative essay with a clear thesis, evidence and rebuttal.'],
            ['q' => 'How much does an argumentative essay cost?', 'a' => 'Pricing is per page and depends on your academic level and deadline. Rates start from $' . $minPriceFormatted . ' per page for high-school level with a 14-day deadline.'],
            ['q' => 'Who writes my argumentative essay?', 'a' => 'Your order is handled by a writer with subject knowledge relevant to your topic. You share your instructions and citation style so the essay matches your requirements.'],
            ['q' => 'Can I request revisions?', 'a' => 'Yes. If the finished essay does not match the instructions you provided, you can request a revision through your account under our revision policy.'],
            ['q' => 'Is my information kept private?', 'a' => 'Yes. Your personal details and order information are treated as confidential, and ordering is done through a secure checkout.'],
            ['q' => 'Which citation styles are supported?', 'a' => 'We support APA, MLA, Chicago and Harvard formatting, among others. Select your required style when you place your order.'],
        ];

        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
                ];
            }, $homeFaqs),
        ];

        $schema[] = $faqSchema;
        echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    @endphp
    </script>
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
        .btn-ghost:hover {
            border-color: var(--blue);
            box-shadow: 0 10px 25px rgba(29,123,255,0.12);
        }
        .btn-primary {
            background: linear-gradient(135deg, #1d7bff, #25c7ff);
            color: white;
            box-shadow: 0 12px 30px rgba(29,123,255,0.35);
        }
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 56px 24px 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
            align-items: center;
        }
        .hero {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: var(--blue);
            background: #eaf3ff;
            padding: 8px 14px;
            border-radius: 999px;
            width: fit-content;
            letter-spacing: 0.2px;
        }
        h1 {
            font-size: clamp(36px, 4vw + 8px, 54px);
            line-height: 1.1;
            margin: 0;
            font-weight: 800;
            letter-spacing: -0.6px;
        }
        h1 .highlight { color: var(--blue); }
        .subtext {
            color: var(--muted);
            font-size: 18px;
            line-height: 1.6;
            max-width: 580px;
            white-space: pre-line;
        }
        .cta-row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .btn-outline {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--dark);
        }
        .btn-outline:hover {
            border-color: var(--blue);
            box-shadow: 0 8px 24px rgba(17, 23, 32, 0.08);
        }
        .ratings {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 12px;
            max-width: 520px;
        }
        .badge {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 20px 40px rgba(17, 24, 39, 0.05);
        }
        .badge .icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-weight: 800;
            color: #fff;
            font-size: 12px;
        }
        .badge .text { font-weight: 700; }
        .hero-visual {
            position: relative;
            min-height: 360px;
            display: grid;
            place-items: center;
        }
        .orbital {
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 30%, rgba(29,123,255,0.16), rgba(29,123,255,0) 55%),
                        radial-gradient(circle at 70% 70%, rgba(37,199,255,0.12), rgba(37,199,255,0) 50%);
            border: 1px dashed rgba(29,123,255,0.18);
            filter: drop-shadow(0 25px 40px rgba(0,0,0,0.06));
        }
        .card {
            position: absolute;
            background: #ffffff;
            border: 1px solid rgba(230,232,240,0.9);
            box-shadow: 0 24px 60px rgba(23,44,85,0.12);
            border-radius: 18px;
            padding: 18px;
            width: 220px;
        }
        .card h4 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #2a2a32;
            letter-spacing: 0.2px;
        }
        .chart {
            height: 96px;
            background: linear-gradient(135deg, rgba(29,123,255,0.12), rgba(37,199,255,0.05));
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }
        .chart::after {
            content: "";
            position: absolute;
            inset: 16px 18px;
            border-radius: 10px;
            border: 1px dashed rgba(29,123,255,0.35);
        }
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f9fafc;
            border-radius: 999px;
            padding: 8px 12px;
            font-weight: 700;
            font-size: 13px;
            color: var(--muted);
        }
        .card:nth-child(1) { top: 16%; left: 6%; }
        .card:nth-child(2) { bottom: 10%; left: 14%; }
        .card:nth-child(3) { top: 22%; right: 10%; }
        .card:nth-child(4) { bottom: 12%; right: 0; }
        .sections {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        .section {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 34px;
            margin-bottom: 26px;
            box-shadow: 0 18px 40px rgba(17,24,39,0.05);
        }
        .section h2 {
            font-size: clamp(24px, 2vw, 30px);
            margin: 0 0 14px;
            letter-spacing: -0.4px;
            line-height: 1.2;
        }
        .section h3 {
            font-size: 19px;
            margin: 24px 0 10px;
            letter-spacing: -0.2px;
        }
        .section p { color: #2b2f3a; margin: 0 0 14px; }
        .section ul, .section ol { color: #2b2f3a; margin: 0 0 16px 24px; }
        .section li { margin-bottom: 8px; }
        .section a { color: var(--blue); font-weight: 700; }
        .section a:hover { text-decoration: underline; }
        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 14px;
            margin: 16px 0;
        }
        .grid-card {
            background: #f9fafc;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
        }
        .grid-card h3 { margin: 0 0 8px; font-size: 17px; }
        .grid-card p { margin: 0; color: var(--muted); font-size: 15px; }
        .steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
            margin: 16px 0;
        }
        .step {
            background: #f9fafc;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
        }
        .step .num {
            display: inline-grid;
            place-items: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1d7bff, #25c7ff);
            color: #fff;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .step h3 { margin: 0 0 8px; font-size: 16px; }
        .step p { margin: 0; color: var(--muted); font-size: 14px; }
        .table-wrap { overflow-x: auto; margin: 16px 0; }
        table { width: 100%; border-collapse: collapse; font-size: 15px; }
        th, td { border: 1px solid var(--border); padding: 10px 12px; text-align: left; }
        th { background: #f4f7ff; font-weight: 800; }
        .faq-item { border-bottom: 1px solid var(--border); padding: 16px 0; }
        .faq-item:last-child { border-bottom: none; }
        .faq-item h3 { margin: 0 0 8px; font-size: 17px; }
        .faq-item p { margin: 0; color: var(--muted); }
        .final-cta {
            background: linear-gradient(135deg, #1d7bff, #25c7ff);
            border-radius: 18px;
            padding: 40px;
            color: #fff;
            text-align: center;
            margin-bottom: 26px;
        }
        .final-cta h2 { color: #fff; margin: 0 0 10px; }
        .final-cta p { color: rgba(255,255,255,0.95); margin: 0 0 20px; }
        .final-cta .btn { background: #fff; color: #1d4ed8; font-size: 16px; padding: 13px 24px; }
        .seo-wrap { max-width: 1200px; margin: 0 auto; padding: 0 24px 30px; }
        .seo-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 18px 40px rgba(17,24,39,0.06);
            color: #1f2937;
            line-height: 1.7;
            font-size: 16px;
        }
        .seo-card h2, .seo-card h3, .seo-card h4 { margin: 0 0 12px; line-height: 1.25; color: #0f172a; letter-spacing: -0.3px; }
        .seo-card h2 { font-size: 26px; font-weight: 800; }
        .seo-card h3 { font-size: 22px; font-weight: 800; }
        .seo-card h4 { font-size: 19px; font-weight: 800; }
        .seo-card p { margin: 0 0 14px; }
        .seo-card ul, .seo-card ol { margin: 0 0 14px 24px; }
        footer {
            background: #14141a;
            color: #c7c8d1;
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
            .nav { gap: 16px; }
            .menu { display: none; }
            main { grid-template-columns: 1fr; padding: 40px 20px 30px; }
            .hero-visual { min-height: 320px; }
            .sections { padding: 0 20px; }
            .section { padding: 24px; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 560px) {
            .footer-grid { grid-template-columns: 1fr; }
            .actions .btn-ghost { display: none; }
        }
    </style>
</head>
<body>
@php
    $homeContent = $homeContent ?? [];
    $seoContent = trim((string) ($homeContent['seo_content'] ?? ''));
    $seoHasHtml = $seoContent !== strip_tags($seoContent);
@endphp
<header>
    <div class="nav">
        <a class="brand" href="{{ url('/') }}">
            <span class="mark">✍</span>
            <span class="text">Buy <strong>Argumentative Essay</strong></span>
        </a>
        <nav class="menu" aria-label="Primary">
            <a href="{{ url('/') }}" class="active">Home</a>
            <a href="{{ url('/argumentative-essay-writing-service') }}">Writing Service</a>
            <a href="#how-it-works">How It Works</a>
            <a href="{{ url('/pricing') }}">Pricing</a>
            <a href="{{ route('writers.index') }}">Writers</a>
        </nav>
        <div class="actions">
            <a class="btn btn-ghost" href="{{ route('order', ['tab' => 'existing']) }}">Sign In</a>
            <a class="btn btn-primary" href="{{ route('order', ['tab' => 'new']) }}">Order Now</a>
        </div>
    </div>
</header>

<main>
    <section class="hero">
        <span class="eyebrow">{{ $homeContent['eyebrow'] ?? 'Custom argumentative essay support' }}</span>
        <h1>{{ $homeContent['hero_title_prefix'] ?? 'Buy' }} <span class="highlight">{{ $homeContent['hero_title_highlight'] ?? 'Argumentative Essay' }}</span>{{ $homeContent['hero_title_suffix'] ? ' ' . $homeContent['hero_title_suffix'] : '' }}</h1>
        <p class="subtext">{{ $homeContent['hero_description'] ?? 'Order a custom argumentative essay written to your instructions and citation style.' }}</p>
        <div class="cta-row">
            <a class="btn btn-primary" href="{{ route('order', ['tab' => 'new']) }}">Order Now</a>
            <a class="btn btn-outline" href="{{ url('/how-it-works') }}">How It Works</a>
            <span class="pill">{{ $homeContent['cta_pill'] ?? 'Free revisions | 24/7 support' }}</span>
        </div>
        <div class="ratings">
            <div class="badge">
                <div class="icon" style="background:#1d7bff;">{{ $homeContent['rating_one_score'] ?? '24/7' }}</div>
                <div class="text">{{ $homeContent['rating_one_label'] ?? 'Support' }}</div>
            </div>
            <div class="badge">
                <div class="icon" style="background:#0f5951;">{{ $homeContent['rating_two_score'] ?? 'Free' }}</div>
                <div class="text">{{ $homeContent['rating_two_label'] ?? 'Revisions' }}</div>
            </div>
            <div class="badge">
                <div class="icon" style="background:#7c3aed;">{{ $homeContent['rating_three_score'] ?? 'Private' }}</div>
                <div class="text">{{ $homeContent['rating_three_label'] ?? 'Ordering' }}</div>
            </div>
        </div>
    </section>

    <section class="hero-visual" aria-hidden="true">
        <div class="orbital"></div>
        <div class="card">
            <h4>{{ $homeContent['card_one_title'] ?? 'Strong Thesis' }}</h4>
            <div class="chart"></div>
        </div>
        <div class="card">
            <h4>{{ $homeContent['card_two_title'] ?? 'Research & Evidence' }}</h4>
            <div class="pill">{{ $homeContent['card_two_pill'] ?? 'Credible Sources | Citations' }}</div>
        </div>
        <div class="card">
            <h4>{{ $homeContent['card_three_title'] ?? 'Counterargument' }}</h4>
            <div class="chart"></div>
        </div>
        <div class="card">
            <h4>{{ $homeContent['card_four_title'] ?? 'Argumentative Essay' }}</h4>
            <div class="pill">{{ $homeContent['card_four_pill'] ?? 'APA | MLA | Chicago' }}</div>
        </div>
    </section>
</main>

<section class="sections" id="buy-online">
    <article class="section">
        <h2>Buy Argumentative Essay Online</h2>
        <p>An argumentative essay asks you to take a position, support it with evidence, and respond to the strongest opposing view. When you <strong>buy an argumentative essay online</strong>, you share your topic, position and instructions, and a writer structures that argument for you — from the thesis statement to the conclusion.</p>
        <p>Every order is written to your requirements and formatted in your citation style. You choose the academic level and deadline, and the price is shown before you submit. If you already have a draft, our <a href="{{ url('/argumentative-essay-editing') }}">argumentative essay editing</a> and <a href="{{ url('/argumentative-essay-proofreading') }}">proofreading</a> services are also available.</p>
    </article>

    <article class="section">
        <h2>Why Choose Our Argumentative Essay Writers?</h2>
        <div class="grid-cards">
            <div class="grid-card">
                <h3>Clear thesis</h3>
                <p>Writers start from a specific, debatable thesis so the whole essay has a single direction.</p>
            </div>
            <div class="grid-card">
                <h3>Sourced evidence</h3>
                <p>Claims are supported with credible sources, cited in APA, MLA, Chicago or Harvard.</p>
            </div>
            <div class="grid-card">
                <h3>Fair rebuttal</h3>
                <p>Counterarguments are addressed honestly rather than ignored.</p>
            </div>
            <div class="grid-card">
                <h3>Your instructions</h3>
                <p>Each essay follows your prompt, level and formatting requirements.</p>
            </div>
        </div>
        <p>Read more about how the work is assigned on our <a href="{{ url('/argumentative-essay-writer') }}">argumentative essay writer</a> page.</p>
    </article>

    <article class="section">
        <h2>What&rsquo;s Included With Your Order?</h2>
        <ul>
            <li>A custom essay written to your topic and position.</li>
            <li>Formatting in your chosen citation style.</li>
            <li>Research and citations for the sources you request.</li>
            <li>Approximately 275 words per page, at your specified spacing.</li>
            <li>Free revisions if the essay does not match your instructions.</li>
            <li>Secure, confidential ordering and 24/7 support.</li>
        </ul>
    </article>

    <article class="section">
        <h2>Professional Argumentative Essay Writing Service</h2>
        <p>Our <a href="{{ url('/argumentative-essay-writing-service') }}">argumentative essay writing service</a> covers the full essay, from prompt to final page. Choose it when you need a complete paper written to your instructions. We also offer lighter-touch support: <a href="{{ url('/write-my-argumentative-essay') }}">write my argumentative essay</a> for full drafts, plus <a href="{{ url('/argumentative-essay-help') }}">argumentative essay help</a> for the parts you are stuck on.</p>
    </article>

    <article class="section" id="how-it-works">
        <h2>How the Service Works</h2>
        <div class="steps">
            <div class="step"><span class="num">1</span><h3>Share instructions</h3><p>Describe your topic, position, citation style and page count.</p></div>
            <div class="step"><span class="num">2</span><h3>Choose level &amp; deadline</h3><p>Pick your academic level and deadline to see the price.</p></div>
            <div class="step"><span class="num">3</span><h3>Confirm your order</h3><p>Review the summary and complete secure checkout.</p></div>
            <div class="step"><span class="num">4</span><h3>Review &amp; revise</h3><p>Receive your essay and request revisions if needed.</p></div>
        </div>
        <p>See the full walkthrough on the <a href="{{ url('/how-it-works') }}">how it works</a> page.</p>
    </article>

    <article class="section" id="pricing">
        <h2>Argumentative Essay Pricing</h2>
        <p>Pricing is per page and depends on your academic level and deadline. The lowest rate is <strong>${{ $minPriceFormatted }} per page</strong> for high-school level with a 14-day deadline.</p>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Deadline</th><th>High School</th><th>College</th><th>Masters</th><th>PhD</th></tr></thead>
                <tbody>
                    <tr><td>8 hours</td><td>$29.60</td><td>$32.60</td><td>$36.60</td><td>$40.60</td></tr>
                    <tr><td>24 hours</td><td>$25.60</td><td>$28.60</td><td>$32.60</td><td>$36.60</td></tr>
                    <tr><td>48 hours</td><td>$19.60</td><td>$21.60</td><td>$25.60</td><td>$29.60</td></tr>
                    <tr><td>7 days</td><td>$14.60</td><td>$16.60</td><td>$20.60</td><td>$24.60</td></tr>
                    <tr><td>14 days</td><td>$12.60</td><td>$14.60</td><td>$18.60</td><td>$22.60</td></tr>
                </tbody>
            </table>
        </div>
        <p>See the complete table and add-ons on the <a href="{{ url('/pricing') }}">pricing</a> page, or explore our <a href="{{ url('/cheap-argumentative-essay') }}">cheap argumentative essay</a> options.</p>
    </article>

    <article class="section">
        <h2>Academic Subjects and Levels Covered</h2>
        <div class="grid-cards">
            <div class="grid-card"><h3>Levels</h3><p>High school, college, masters and PhD.</p></div>
            <div class="grid-card"><h3>Subjects</h3><p>Business, nursing, technology, literature, economics, history and more.</p></div>
            <div class="grid-card"><h3>Formats</h3><p>Essay, research paper, case study and presentations.</p></div>
            <div class="grid-card"><h3>Spacing</h3><p>Single or double spacing, to your rubric.</p></div>
        </div>
        <p>For college-level work specifically, see our <a href="{{ url('/college-argumentative-essay') }}">college argumentative essay</a> page.</p>
    </article>

    <article class="section">
        <h2>Argumentative vs. Persuasive Essays</h2>
        <p>People often use the terms interchangeably, but they differ. A <strong>persuasive essay</strong> relies more on the writer&rsquo;s voice and emotional appeal to win the reader over. An <strong>argumentative essay</strong> leans on researched evidence and reason, and it explicitly acknowledges the counterargument.</p>
        <p>Both need a clear thesis, but the argumentative essay is judged more on the strength of its evidence and how well it handles opposing views.</p>
    </article>

    <article class="section">
        <h2>Structure of a Strong Argumentative Essay</h2>
        <ol>
            <li><strong>Introduction</strong> — presents the topic and states the thesis.</li>
            <li><strong>Body paragraphs</strong> — each opens with a claim, then evidence, then reasoning.</li>
            <li><strong>Counterargument</strong> — presents the opposing view and rebuts it.</li>
            <li><strong>Conclusion</strong> — restates the thesis and summarises the argument.</li>
        </ol>
        <p>Use our <a href="{{ url('/argumentative-essay-outline') }}">argumentative essay outline</a> template to plan each section before you write.</p>
    </article>

    <article class="section">
        <h2>Research, Evidence and Counterarguments</h2>
        <p>A claim is only as strong as the evidence behind it. Strong argumentative essays draw on credible sources — peer-reviewed research, primary documents and reputable publications — and cite them correctly. A counterargument is not a weakness; it shows the writer has considered the full debate and can still defend the position.</p>
        <p>If you are learning these skills, start with our guide on <a href="{{ url('/how-to-write-an-argumentative-essay') }}">how to write an argumentative essay</a>.</p>
    </article>

    <article class="section">
        <h2>Citation Styles</h2>
        <p>We format essays in the styles most commonly required by instructors:</p>
        <ul>
            <li><strong>APA</strong> — common in the social sciences.</li>
            <li><strong>MLA</strong> — common in the humanities.</li>
            <li><strong>Chicago</strong> — common in history and some social sciences.</li>
            <li><strong>Harvard</strong> — author-date referencing used widely in the UK and Australia.</li>
        </ul>
        <p>Select your required style when you place your order.</p>
    </article>

    <article class="section">
        <h2>Deadline Options</h2>
        <p>Choose a deadline that matches your schedule. We offer turnaround options from <strong>8 hours</strong> up to <strong>14 days</strong>. Shorter deadlines cost more per page; a longer deadline gives you a lower rate and more time for revisions.</p>
        <p>See how deadline affects price on the <a href="{{ url('/pricing') }}">pricing</a> page.</p>
    </article>

    <article class="section">
        <h2>Editing and Revision Process</h2>
        <p>After delivery, review the essay against your instructions. If something does not match — a misunderstood prompt, the wrong citation style, or a section that missed your requirements — you can request a revision through your account under our <a href="{{ url('/revision-policy') }}">revision policy</a>. Prefer to improve a draft you already have? Try our <a href="{{ url('/argumentative-essay-editing') }}">editing</a> service.</p>
    </article>

    <article class="section">
        <h2>Privacy and Confidentiality</h2>
        <p>Your personal details and order information are kept confidential. Ordering is completed through a secure checkout, and your work is not published or shared. Read the full details in our <a href="{{ url('/privacy-policy') }}">privacy policy</a>.</p>
    </article>

    <article class="section" id="faq">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item"><h3>Can I buy an argumentative essay online?</h3><p>Yes. Choose your academic level and deadline, describe your topic and instructions, and a writer prepares a custom argumentative essay with a clear thesis, evidence and rebuttal.</p></div>
        <div class="faq-item"><h3>How much does an argumentative essay cost?</h3><p>Pricing is per page and depends on your academic level and deadline. Rates start from ${{ $minPriceFormatted }} per page for high-school level with a 14-day deadline.</p></div>
        <div class="faq-item"><h3>Who writes my argumentative essay?</h3><p>Your order is handled by a writer with subject knowledge relevant to your topic. You share your instructions and citation style so the essay matches your requirements.</p></div>
        <div class="faq-item"><h3>Can I request revisions?</h3><p>Yes. If the finished essay does not match the instructions you provided, you can request a revision through your account under our <a href="{{ url('/revision-policy') }}">revision policy</a>.</p></div>
        <div class="faq-item"><h3>Is my information kept private?</h3><p>Yes. Your personal details and order information are treated as confidential, and ordering is done through a secure checkout.</p></div>
        <div class="faq-item"><h3>Which citation styles are supported?</h3><p>We support APA, MLA, Chicago and Harvard formatting, among others. Select your required style when you place your order.</p></div>
    </article>
</section>

@if($seoContent !== '')
    <section class="seo-wrap" id="seo-content">
        <article class="seo-card">
            @if($seoHasHtml)
                {!! $seoContent !!}
            @else
                {!! nl2br(e($seoContent)) !!}
            @endif
        </article>
    </section>
@endif

<section class="sections">
    <div class="final-cta">
        <h2>Ready to Order Your Argumentative Essay?</h2>
        <p>Share your instructions, choose a deadline, and receive a custom argumentative essay.</p>
        <a class="btn" href="{{ route('order', ['tab' => 'new']) }}">Get Started</a>
    </div>
</section>

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
