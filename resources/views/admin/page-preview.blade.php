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
    $headingTwo = trim((string) ($page['heading_two'] ?? ''));
    $pageTitle = trim((string) ($page['page_title'] ?? ''));
    $normalizedHeadingTwo = strtolower(trim(preg_replace('/\s+/', ' ', strip_tags($headingTwo))));
    $normalizedPageTitle = strtolower(trim(preg_replace('/\s+/', ' ', strip_tags($pageTitle))));
    if ($headingTwo === '' || ($normalizedHeadingTwo !== '' && $normalizedHeadingTwo === $normalizedPageTitle)) {
        $headingTwo = 'Overview';
    }

    if (!function_exists('renderPlainPreviewBodyWithStructure')) {
        function renderPlainPreviewBodyWithStructure(string $text): string
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

    if (!function_exists('autoSectionizePreviewPlainBody')) {
        function autoSectionizePreviewPlainBody(string $text): string
        {
            $text = trim($text);
            if ($text === '') {
                return '';
            }

            $sentences = preg_split('/(?<=[\.\!\?])\s+/u', preg_replace('/\s+/', ' ', $text), -1, PREG_SPLIT_NO_EMPTY);
            if (!is_array($sentences) || count($sentences) < 3) {
                return '<p>' . e($text) . '</p>';
            }

            $sectionTitles = ['Introduction', 'Main Points', 'Practical Guidance', 'Final Thoughts'];
            $sections = max(2, min(4, (int) ceil(count($sentences) / 3)));
            $chunkSize = (int) ceil(count($sentences) / $sections);
            $html = [];
            $index = 0;

            for ($i = 0; $i < $sections; $i++) {
                $chunk = array_slice($sentences, $index, $chunkSize);
                if (empty($chunk)) {
                    continue;
                }

                $html[] = '<h3>' . e($sectionTitles[$i] ?? ('Section ' . ($i + 1))) . '</h3>';
                $html[] = '<p>' . e(implode(' ', $chunk)) . '</p>';
                $index += $chunkSize;
            }

            return implode("\n", $html);
        }
    }

    $renderedBody = $hasHtml ? $bodyText : renderPlainPreviewBodyWithStructure($bodyText);
    if (!$hasHtml && !preg_match('/<h[1-6]\b/i', $renderedBody)) {
        $renderedBody = autoSectionizePreviewPlainBody($bodyText);
    }
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
        <h2>{{ $headingTwo }}</h2>
        <div class="body">
            {!! $renderedBody !!}
        </div>
    </div>
</div>
</body>
</html>
