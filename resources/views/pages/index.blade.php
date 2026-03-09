<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages | Buy Argumentative Essay</title>
    <style>
        :root { --ink:#0f172a; --muted:#4b5563; --line:#e5e7eb; --bg:#f8fafc; --card:#ffffff; --accent:#1d7bff; }
        *{box-sizing:border-box;}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;}
        .wrap{max-width:1060px;margin:34px auto;padding:0 16px;}
        h1{margin:0 0 10px;font-size:40px;line-height:1.1;letter-spacing:-0.6px;}
        .lead{margin:0 0 20px;color:var(--muted);font-size:18px;}
        .grid{display:grid;gap:14px;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));}
        .card{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:16px;display:grid;gap:10px;}
        .type{width:fit-content;padding:4px 10px;border-radius:999px;background:#eaf3ff;color:#1d7bff;font-weight:800;font-size:12px;}
        .title{font-size:22px;font-weight:800;line-height:1.24;}
        .desc{color:var(--muted);line-height:1.6;}
        .btn{display:inline-flex;align-items:center;padding:10px 14px;border-radius:10px;text-decoration:none;font-weight:800;border:1px solid var(--accent);color:#fff;background:var(--accent);width:fit-content;}
        .empty{background:#fff;border:1px solid var(--line);border-radius:14px;padding:20px;color:var(--muted);font-weight:700;}
    </style>
</head>
<body>
<div class="wrap">
    <h1>Pages</h1>
    <p class="lead">Explore published pages and posts.</p>

    @if(empty($pages))
        <div class="empty">No pages have been published yet.</div>
    @else
        <section class="grid">
            @foreach($pages as $page)
                <article class="card">
                    <div class="type">{{ $page['type'] ?? 'Post' }}</div>
                    <div class="title">{{ $page['page_title'] ?? 'Untitled' }}</div>
                    <div class="desc">{{ $page['meta_description'] ?? '' }}</div>
                    <a class="btn" href="{{ route('pages.show', ['slug' => $page['slug']]) }}">Read More</a>
                </article>
            @endforeach
        </section>
    @endif
</div>
</body>
</html>
