<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page['meta_title'] ?? ($page['page_title'] ?? 'Page') }}</title>
    <meta name="description" content="{{ $page['meta_description'] ?? '' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#f4f6fb; --ink:#111827; --muted:#4b5563; --line:#e5e7eb; --card:#ffffff; --hero:#b31345; --hero-dark:#9f1239; --accent:#ff8a00; --link:#1d4ed8; }
        *{box-sizing:border-box;}
        html{scroll-behavior:smooth;}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:'Manrope',system-ui,-apple-system,sans-serif;}
        a{color:inherit;}
        .site-top{padding:16px 20px;background:#0f172a;color:#e5e7eb;border-bottom:1px solid rgba(255,255,255,0.08);}
        .site-top-inner{max-width:1320px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;}
        .brand{font-weight:800;font-size:22px;letter-spacing:-0.3px;text-decoration:none;}
        .brand strong{color:#60a5fa;}
        .back{display:inline-flex;align-items:center;gap:8px;text-decoration:none;padding:10px 13px;border-radius:10px;background:#111827;border:1px solid #243047;font-weight:700;font-size:14px;}
        .hero{background:linear-gradient(140deg,var(--hero),var(--hero-dark));color:#fff;}
        .hero-inner{max-width:1320px;margin:0 auto;padding:42px 20px 52px;}
        .crumbs{font-size:14px;font-weight:700;opacity:0.9;display:flex;flex-wrap:wrap;gap:8px;align-items:center;}
        .crumbs .dot{opacity:0.65;}
        .hero-title{margin:14px 0 12px;font-size:clamp(30px,3.3vw,58px);line-height:1.08;letter-spacing:-0.8px;max-width:980px;}
        .hero-meta{display:flex;flex-wrap:wrap;gap:10px;align-items:center;font-size:15px;font-weight:700;opacity:0.95;}
        .hero-meta .sep{opacity:0.6;}
        .content-wrap{max-width:1320px;margin:24px auto 34px;padding:0 20px;display:grid;grid-template-columns:minmax(220px,260px) minmax(0,1fr) minmax(230px,300px);gap:22px;align-items:start;}
        .card{background:var(--card);border:1px solid var(--line);border-radius:14px;box-shadow:0 12px 30px rgba(15,23,42,0.05);}
        .toc-card{position:sticky;top:16px;padding:16px;}
        .toc-title{margin:0 0 12px;font-size:30px;font-weight:900;letter-spacing:-0.5px;}
        .toc-list{list-style:none;margin:0;padding:0;display:grid;gap:6px;}
        .toc-list li a{display:block;text-decoration:none;color:#374151;padding:8px 10px;border-radius:8px;font-size:14px;font-weight:700;line-height:1.35;}
        .toc-list li a:hover,.toc-list li a.active{background:#eef2ff;color:#1d4ed8;}
        .toc-list li.level-3 a{padding-left:22px;font-size:13px;}
        .toc-list li.level-4 a{padding-left:34px;font-size:13px;}
        .toc-empty{font-size:13px;color:var(--muted);font-weight:700;}
        .article-card{padding:20px;}
        .hero-img{width:100%;max-height:460px;object-fit:cover;border:1px solid var(--line);border-radius:12px;margin-bottom:18px;}
        .article-body{font-size:18px;line-height:1.72;color:#1f2937;}
        .article-body h1,.article-body h2,.article-body h3,.article-body h4,.article-body h5,.article-body h6{color:#0f172a;line-height:1.22;letter-spacing:-0.3px;margin:22px 0 12px;}
        .article-body h1{font-size:32px;}
        .article-body h2{font-size:28px;}
        .article-body h3{font-size:24px;}
        .article-body h4{font-size:21px;}
        .article-body h5{font-size:19px;}
        .article-body h6{font-size:17px;}
        .article-body p{margin:0 0 14px;}
        .article-body ul,.article-body ol{margin:0 0 14px 24px;}
        .article-body table{width:100%;border-collapse:collapse;margin:0 0 14px;}
        .article-body td,.article-body th{border:1px solid var(--line);padding:8px 10px;}
        .article-body a{color:var(--link);}
        .rail{display:grid;gap:14px;position:sticky;top:16px;}
        .rail-card{padding:16px;}
        .rail-title{margin:0 0 10px;font-size:24px;font-weight:900;letter-spacing:-0.4px;}
        .meta-pair{display:grid;gap:4px;margin-bottom:12px;}
        .meta-pair small{font-size:11px;letter-spacing:0.4px;text-transform:uppercase;color:#6b7280;font-weight:800;}
        .meta-pair div{font-size:14px;font-weight:700;line-height:1.45;color:#1f2937;}
        .cta{display:inline-flex;justify-content:center;align-items:center;width:100%;padding:11px 14px;border-radius:10px;background:var(--accent);color:#fff;text-decoration:none;font-weight:900;}
        .cta + .cta{margin-top:8px;background:#fff;color:#1f2937;border:1px solid var(--line);}
        @media(max-width:1200px){.content-wrap{grid-template-columns:240px minmax(0,1fr);} .rail{grid-column:1/-1;position:static;grid-template-columns:repeat(2,minmax(0,1fr));} .hero-title{max-width:none;}}
        @media(max-width:900px){.content-wrap{grid-template-columns:1fr;} .toc-card,.rail{position:static;} .rail{grid-template-columns:1fr;} .article-body{font-size:17px;} .article-body h1{font-size:30px;} .article-body h2{font-size:27px;} .article-body h3{font-size:24px;} .article-body h4{font-size:21px;}}
    </style>
</head>
<body>
@php
    $bodyText = trim((string) ($page['description'] ?? ''));
    $hasHtml = $bodyText !== strip_tags($bodyText);
    $headingTwo = trim((string) ($page['heading_two'] ?? ''));
    if ($headingTwo === '') {
        $headingTwo = 'Overview';
    }

    if (!function_exists('renderPlainBodyWithStructure')) {
        function renderPlainBodyWithStructure(string $text): string
        {
            $text = trim($text);
            if ($text === '') {
                return '';
            }

            $lines = preg_split('/\R/u', str_replace(["\r\n", "\r"], "\n", $text));
            $html = [];
            $listType = null;

            $closeList = function () use (&$html, &$listType): void {
                if ($listType) {
                    $html[] = '</' . $listType . '>';
                    $listType = null;
                }
            };

            foreach ($lines as $lineRaw) {
                $line = trim((string) $lineRaw);
                if ($line === '') {
                    $closeList();
                    continue;
                }

                if (preg_match('/^(#{1,6})\s+(.+)$/u', $line, $m)) {
                    $closeList();
                    $level = max(1, min(6, strlen((string) $m[1])));
                    $html[] = '<h' . $level . '>' . e(trim((string) $m[2])) . '</h' . $level . '>';
                    continue;
                }

                if (preg_match('/^\d+[\.\)]\s+(.+)$/u', $line, $m)) {
                    if ($listType !== 'ol') {
                        $closeList();
                        $html[] = '<ol>';
                        $listType = 'ol';
                    }
                    $html[] = '<li>' . e(trim((string) $m[1])) . '</li>';
                    continue;
                }

                if (preg_match('/^[-*•]\s+(.+)$/u', $line, $m)) {
                    if ($listType !== 'ul') {
                        $closeList();
                        $html[] = '<ul>';
                        $listType = 'ul';
                    }
                    $html[] = '<li>' . e(trim((string) $m[1])) . '</li>';
                    continue;
                }

                $wordCount = str_word_count(preg_replace('/[^A-Za-z0-9\s]/', ' ', $line));
                $isHeadingLike = $wordCount > 1 && $wordCount <= 12 && strlen($line) <= 90 && !preg_match('/[.!?]$/u', $line);
                if ($isHeadingLike) {
                    $closeList();
                    $html[] = '<h3>' . e(rtrim($line, ':')) . '</h3>';
                    continue;
                }

                $closeList();
                $html[] = '<p>' . e($line) . '</p>';
            }

            $closeList();

            return implode("\n", $html);
        }
    }

    $renderedBody = $hasHtml ? $bodyText : renderPlainBodyWithStructure($bodyText);
    $plain = trim(preg_replace('/\s+/', ' ', strip_tags($bodyText)));
    $words = $plain === '' ? 0 : count(explode(' ', $plain));
    $readMinutes = max(1, (int) ceil($words / 220));
    $updatedAt = !empty($page['updated_at']) && strtotime((string) $page['updated_at']) ? date('M d, Y', strtotime((string) $page['updated_at'])) : date('M d, Y');
@endphp
<header class="site-top">
    <div class="site-top-inner">
        <a class="brand" href="{{ url('/') }}">Buy <strong>Argumentative Essay</strong></a>
        <a class="back" href="{{ route('pages.index') }}">Back to Pages</a>
    </div>
</header>

<section class="hero">
    <div class="hero-inner">
        <div class="crumbs">
            <span>Home</span>
            <span class="dot">/</span>
            <span>Pages</span>
            <span class="dot">/</span>
            <span>{{ $page['type'] ?? 'Post' }}</span>
        </div>
        <h1 class="hero-title">{{ $page['page_title'] ?? 'Untitled' }}</h1>
        <div class="hero-meta">
            <span>Type: {{ $page['type'] ?? 'Post' }}</span>
            <span class="sep">|</span>
            <span>{{ $readMinutes }} min read</span>
            <span class="sep">|</span>
            <span>Updated {{ $updatedAt }}</span>
        </div>
    </div>
</section>

<main class="content-wrap">
    <aside class="card toc-card">
        <h2 class="toc-title">Contents</h2>
        <ul id="tocList" class="toc-list"></ul>
        <div id="tocEmpty" class="toc-empty">Add heading tags (H2, H3, H4) to build this table of contents.</div>
    </aside>

    <article class="card article-card">
        @if(!empty($page['feature_image']))
            <img class="hero-img" src="{{ $page['feature_image'] }}" alt="{{ $page['image_alt_text'] ?? 'Page image' }}">
        @endif
        <div id="articleBody" class="article-body">
            <h2>{{ $headingTwo }}</h2>
            {!! $renderedBody !!}
        </div>
    </article>

    <aside class="rail">
        <section class="card rail-card">
            <h3 class="rail-title">Need Help Fast?</h3>
            <p style="margin:0 0 12px;color:var(--muted);font-weight:700;line-height:1.55;">Get a professional writer for your assignment with flexible deadlines and revision support.</p>
            <a class="cta" href="{{ route('order', ['tab' => 'new']) }}">Order Now</a>
            <a class="cta" href="{{ route('writers.index') }}">Browse Writers</a>
        </section>
    </aside>
</main>

<script>
    (function () {
        const body = document.getElementById('articleBody');
        const tocList = document.getElementById('tocList');
        const tocEmpty = document.getElementById('tocEmpty');
        if (!body || !tocList || !tocEmpty) {
            return;
        }

        const headings = Array.from(body.querySelectorAll('h2, h3, h4'));
        if (!headings.length) {
            tocEmpty.style.display = 'block';
            return;
        }

        tocEmpty.style.display = 'none';

        function slugify(value) {
            return (value || '')
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
        }

        const used = {};
        headings.forEach(function (heading, index) {
            const level = Number((heading.tagName || 'H2').replace('H', ''));
            const base = slugify(heading.textContent) || ('section-' + (index + 1));
            used[base] = (used[base] || 0) + 1;
            const id = used[base] > 1 ? (base + '-' + used[base]) : base;
            heading.id = heading.id || id;

            const item = document.createElement('li');
            item.className = 'level-' + level;
            const link = document.createElement('a');
            link.href = '#' + heading.id;
            link.textContent = heading.textContent.trim();
            item.appendChild(link);
            tocList.appendChild(item);
        });

        const tocLinks = Array.from(tocList.querySelectorAll('a'));
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }
                const activeId = entry.target.getAttribute('id');
                tocLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + activeId);
                });
            });
        }, { rootMargin: '0px 0px -70% 0px', threshold: 0.2 });

        headings.forEach(function (heading) {
            observer.observe(heading);
        });
    })();
</script>
</body>
</html>
