<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview | {{ $page['meta_title'] ?? ($page['page_title'] ?? 'Page') }}</title>
    <style>
        :root { --ink:#0f172a; --muted:#4b5563; --line:#e5e7eb; --bg:#f8fafc; --card:#ffffff; --accent:#1d7bff; }
        *{box-sizing:border-box;}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;}
        .wrap{max-width:980px;margin:26px auto;padding:0 16px;display:grid;gap:16px;}
        .top{display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;}
        .btn{display:inline-flex;align-items:center;padding:10px 14px;border-radius:10px;text-decoration:none;font-weight:700;border:1px solid var(--line);color:#1f2937;background:#fff;}
        .btn.primary{background:var(--accent);border-color:var(--accent);color:#fff;}
        .card{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:18px;}
        h1{margin:0 0 8px;font-size:38px;line-height:1.12;letter-spacing:-0.4px;}
        h2{margin:0 0 10px;font-size:28px;line-height:1.2;}
        .meta{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:12px;}
        .meta-item{background:#f8fafc;border:1px solid var(--line);border-radius:10px;padding:10px;}
        .meta-item small{display:block;color:var(--muted);font-weight:700;margin-bottom:4px;text-transform:uppercase;letter-spacing:0.4px;font-size:11px;}
        .hero-img{width:100%;max-height:420px;object-fit:cover;border-radius:12px;border:1px solid var(--line);margin:10px 0 0;}
        .body{color:#1f2937;font-size:18px;line-height:1.72;}
        .body p{margin:0 0 14px;}
        @media(max-width:760px){.meta{grid-template-columns:1fr;} h1{font-size:30px;} h2{font-size:24px;}}
    </style>
</head>
<body>
@php
    $bodyText = trim((string) ($page['description'] ?? ''));
    $hasHtml = $bodyText !== strip_tags($bodyText);
@endphp
<div class="wrap">
    <div class="top">
        <div>
            <div style="font-size:13px;color:#6b7280;font-weight:700;">Preview Mode</div>
            <div style="font-size:24px;font-weight:800;">{{ $page['page_title'] ?? 'Untitled' }}</div>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
            <a class="btn" href="{{ route('admin.pages') }}">Back to Pages</a>
            <a class="btn" href="{{ route('admin.pages.edit', ['id' => $page['id']]) }}">Edit</a>
            <a class="btn primary" href="{{ route('pages.show', ['slug' => $page['slug']]) }}" target="_blank" rel="noopener">Open Live Page</a>
        </div>
    </div>

    <div class="card">
        <h1>{{ $page['page_title'] ?? 'Untitled' }}</h1>
        <p style="margin:0;color:var(--muted);font-size:18px;line-height:1.7;">{{ $page['meta_description'] ?? '' }}</p>
        @if(!empty($page['feature_image']))
            <img class="hero-img" src="{{ $page['feature_image'] }}" alt="{{ $page['image_alt_text'] ?? 'Page image' }}">
        @endif
    </div>

    <div class="card">
        <div class="meta">
            <div class="meta-item">
                <small>Meta Title</small>
                <div>{{ $page['meta_title'] ?? '-' }}</div>
            </div>
            <div class="meta-item">
                <small>Type</small>
                <div>{{ $page['type'] ?? 'Post' }}</div>
            </div>
            <div class="meta-item">
                <small>Slug</small>
                <div>{{ $page['slug'] ?? '-' }}</div>
            </div>
            <div class="meta-item">
                <small>Image Alt Text</small>
                <div>{{ $page['image_alt_text'] ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>{{ $page['heading_two'] ?? 'Heading 2' }}</h2>
        <div class="body">
            @if($hasHtml)
                {!! $bodyText !!}
            @else
                {!! nl2br(e($bodyText)) !!}
            @endif
        </div>
    </div>
</div>
</body>
</html>
