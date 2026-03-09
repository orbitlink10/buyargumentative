<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page['meta_title'] ?? ($page['page_title'] ?? 'Page') }}</title>
    <meta name="description" content="{{ $page['meta_description'] ?? '' }}">
    <style>
        :root { --ink:#0f172a; --muted:#4b5563; --line:#e5e7eb; --bg:#f8fafc; --card:#ffffff; --accent:#1d7bff; }
        *{box-sizing:border-box;}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;}
        .wrap{max-width:980px;margin:34px auto;padding:0 16px 30px;display:grid;gap:18px;}
        .top{display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;}
        .back{display:inline-flex;align-items:center;padding:10px 14px;border-radius:10px;text-decoration:none;font-weight:800;border:1px solid var(--line);color:#1f2937;background:#fff;}
        .card{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:18px;}
        .type{display:inline-flex;align-items:center;padding:5px 10px;border-radius:999px;background:#eaf3ff;color:#1d7bff;font-weight:800;font-size:12px;}
        h1{margin:10px 0 8px;font-size:44px;line-height:1.1;letter-spacing:-0.7px;}
        h2{margin:0 0 12px;font-size:30px;line-height:1.2;}
        .meta{margin:0;color:var(--muted);font-size:18px;line-height:1.7;}
        .hero-img{width:100%;max-height:420px;object-fit:cover;border-radius:12px;border:1px solid var(--line);margin-top:14px;}
        .body{font-size:18px;line-height:1.72;color:#1f2937;}
        .body p{margin:0 0 14px;}
        @media(max-width:760px){h1{font-size:34px;} h2{font-size:26px;}}
    </style>
</head>
<body>
@php
    $bodyText = trim((string) ($page['description'] ?? ''));
    $hasHtml = $bodyText !== strip_tags($bodyText);
@endphp
<div class="wrap">
    <div class="top">
        <a class="back" href="{{ route('pages.index') }}">Back to Pages</a>
        <span class="type">{{ $page['type'] ?? 'Post' }}</span>
    </div>

    <section class="card">
        <h1>{{ $page['page_title'] ?? 'Untitled' }}</h1>
        <p class="meta">{{ $page['meta_description'] ?? '' }}</p>
        @if(!empty($page['feature_image']))
            <img class="hero-img" src="{{ $page['feature_image'] }}" alt="{{ $page['image_alt_text'] ?? 'Page image' }}">
        @endif
    </section>

    <section class="card">
        <h2>{{ $page['heading_two'] ?? 'Heading 2' }}</h2>
        <div class="body">
            @if($hasHtml)
                {!! $bodyText !!}
            @else
                {!! nl2br(e($bodyText)) !!}
            @endif
        </div>
    </section>
</div>
</body>
</html>
