<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage | Buy Argumentative Essay</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --accent:#f25c3c; --dark:#1c1c28; --muted:#6b6b7a; --border:#e5e8ed; --bg:#f7f8fb; --card:#ffffff; }
        *{box-sizing:border-box;}
        body{margin:0;font-family:'Manrope',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--dark);}
        .layout{display:grid;grid-template-columns:240px 1fr;min-height:100vh;}
        .sidebar{background:#fff;border-right:1px solid var(--border);padding:24px;display:grid;gap:26px;}
        .brand{display:flex;align-items:center;gap:12px;font-size:24px;font-weight:800;}
        .brand .icon{width:44px;height:44px;border-radius:14px;background:var(--accent);display:grid;place-items:center;color:#fff;font-size:22px;}
        .nav-group{display:grid;gap:8px;}
        .nav-title{font-size:12px;letter-spacing:0.4px;text-transform:uppercase;color:var(--muted);font-weight:800;}
        .nav-link{display:flex;align-items:center;gap:10px;padding:12px 14px;border-radius:12px;color:#2f3236;font-weight:800;text-decoration:none;}
        .nav-link.active,.nav-link:hover{background:#fff2ec;color:var(--accent);}
        .content{padding:24px 28px 40px;display:grid;gap:16px;}
        .topbar{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;}
        .btn{border:none;border-radius:10px;padding:10px 12px;font-weight:900;cursor:pointer;text-decoration:none;}
        .btn-primary{background:var(--accent);color:#fff;}
        .card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:16px;}
        .grid{display:grid;gap:12px;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));}
        .field{display:grid;gap:6px;}
        .field.full{grid-column:1/-1;}
        .field label{font-size:12px;text-transform:uppercase;letter-spacing:0.3px;color:var(--muted);font-weight:800;}
        .field input,.field textarea{width:100%;border:1px solid var(--border);border-radius:10px;padding:11px 12px;font:inherit;font-size:14px;background:#fff;color:var(--dark);}
        .field textarea{min-height:96px;resize:vertical;}
        .field textarea.seo-editor{min-height:360px;}
        .ok{background:#e7f8ee;color:#1f9b55;padding:10px 12px;border-radius:10px;font-weight:800;}
        .err{background:#fde9e9;color:#c53030;padding:10px 12px;border-radius:10px;font-weight:800;}
        .hint{font-size:13px;color:var(--muted);font-weight:700;}
        .hint.warning{color:#9a5800;}
        .actions{display:flex;justify-content:flex-end;}
        @media(max-width:1000px){.layout{grid-template-columns:1fr;} .content{padding:20px;}}
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand"><span class="icon">*</span><span>Admin</span></div>
        <div class="nav-group">
            <div class="nav-title">Main</div>
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="nav-link" href="{{ route('order.create') }}">Add Order</a>
            <a class="nav-link" href="{{ route('admin.orders') }}">Orders</a>
            <a class="nav-link" href="{{ route('admin.courses') }}">Courses</a>
        </div>
        <div class="nav-group">
            <div class="nav-title">Manage Users</div>
            <a class="nav-link" href="{{ route('admin.clients') }}">Clients</a>
            <a class="nav-link" href="{{ route('admin.writers') }}">Writers</a>
        </div>
        <div class="nav-group">
            <div class="nav-title">Configs</div>
            <a class="nav-link" href="{{ route('admin.settings') }}">Settings</a>
            <a class="nav-link active" href="{{ route('admin.homepage') }}">Homepage Content</a>
            <a class="nav-link" href="{{ route('admin.pages') }}">Pages</a>
        </div>
        <div class="nav-group">
            <div class="nav-title">Account</div>
            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </aside>

    <main class="content">
        <div class="topbar">
            <div>
                <div style="font-size:14px; color:var(--muted); font-weight:700;">Homepage Content</div>
                <div style="font-size:24px; font-weight:900;">Homepage Content Editor</div>
            </div>
            <button form="homepageContentForm" type="submit" class="btn btn-primary">Save Homepage</button>
        </div>

        <div class="hint">Update hero text, trust badges, and highlight cards displayed on the public homepage.</div>

        @if(session('homepage_saved'))
            <div class="ok">{{ session('homepage_saved') }}</div>
        @endif
        @if($errors->any())
            <div class="err">{{ $errors->first() }}</div>
        @endif

        <form id="homepageContentForm" action="{{ route('admin.homepage.update') }}" method="POST" class="card">
            @csrf
            <div class="grid">
                <div class="field">
                    <label for="eyebrow">Eyebrow</label>
                    <input id="eyebrow" name="eyebrow" type="text" value="{{ old('eyebrow', $homeContent['eyebrow'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="cta_pill">CTA Pill</label>
                    <input id="cta_pill" name="cta_pill" type="text" value="{{ old('cta_pill', $homeContent['cta_pill'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="hero_title_prefix">Hero Title Prefix</label>
                    <input id="hero_title_prefix" name="hero_title_prefix" type="text" value="{{ old('hero_title_prefix', $homeContent['hero_title_prefix'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="hero_title_highlight">Hero Title Highlight</label>
                    <input id="hero_title_highlight" name="hero_title_highlight" type="text" value="{{ old('hero_title_highlight', $homeContent['hero_title_highlight'] ?? '') }}" required>
                </div>
                <div class="field full">
                    <label for="hero_title_suffix">Hero Title Suffix</label>
                    <input id="hero_title_suffix" name="hero_title_suffix" type="text" value="{{ old('hero_title_suffix', $homeContent['hero_title_suffix'] ?? '') }}" required>
                </div>
                <div class="field full">
                    <label for="hero_description">Hero Description</label>
                    <textarea id="hero_description" name="hero_description" required>{{ old('hero_description', $homeContent['hero_description'] ?? '') }}</textarea>
                </div>
                <div class="field full">
                    <label for="seo_content">Home Page Content (SEO)</label>
                    <textarea id="seo_content" name="seo_content" class="seo-editor" placeholder="Write SEO content here...">{{ old('seo_content', $homeContent['seo_content'] ?? '') }}</textarea>
                    <div class="hint">Long-form SEO content supports plain text or HTML formatting.</div>
                    <div id="seo_editor_notice" class="hint warning" style="display:none;"></div>
                </div>
                <div class="field">
                    <label for="rating_one_score">Rating One Score</label>
                    <input id="rating_one_score" name="rating_one_score" type="text" value="{{ old('rating_one_score', $homeContent['rating_one_score'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="rating_one_label">Rating One Label</label>
                    <input id="rating_one_label" name="rating_one_label" type="text" value="{{ old('rating_one_label', $homeContent['rating_one_label'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="rating_two_score">Rating Two Score</label>
                    <input id="rating_two_score" name="rating_two_score" type="text" value="{{ old('rating_two_score', $homeContent['rating_two_score'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="rating_two_label">Rating Two Label</label>
                    <input id="rating_two_label" name="rating_two_label" type="text" value="{{ old('rating_two_label', $homeContent['rating_two_label'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="rating_three_score">Rating Three Score</label>
                    <input id="rating_three_score" name="rating_three_score" type="text" value="{{ old('rating_three_score', $homeContent['rating_three_score'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="rating_three_label">Rating Three Label</label>
                    <input id="rating_three_label" name="rating_three_label" type="text" value="{{ old('rating_three_label', $homeContent['rating_three_label'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="card_one_title">Card One Title</label>
                    <input id="card_one_title" name="card_one_title" type="text" value="{{ old('card_one_title', $homeContent['card_one_title'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="card_two_title">Card Two Title</label>
                    <input id="card_two_title" name="card_two_title" type="text" value="{{ old('card_two_title', $homeContent['card_two_title'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="card_two_pill">Card Two Pill</label>
                    <input id="card_two_pill" name="card_two_pill" type="text" value="{{ old('card_two_pill', $homeContent['card_two_pill'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="card_three_title">Card Three Title</label>
                    <input id="card_three_title" name="card_three_title" type="text" value="{{ old('card_three_title', $homeContent['card_three_title'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="card_four_title">Card Four Title</label>
                    <input id="card_four_title" name="card_four_title" type="text" value="{{ old('card_four_title', $homeContent['card_four_title'] ?? '') }}" required>
                </div>
                <div class="field">
                    <label for="card_four_pill">Card Four Pill</label>
                    <input id="card_four_pill" name="card_four_pill" type="text" value="{{ old('card_four_pill', $homeContent['card_four_pill'] ?? '') }}" required>
                </div>
            </div>
            <div class="actions">
                <button type="submit" class="btn btn-primary">Save Homepage</button>
            </div>
        </form>
    </main>
</div>
<script>
    (function () {
        const textarea = document.getElementById('seo_content');
        const notice = document.getElementById('seo_editor_notice');
        if (!textarea) {
            return;
        }

        function showTextareaFallback(message) {
            textarea.style.display = 'block';
            textarea.style.visibility = 'visible';
            if (notice) {
                notice.textContent = message;
                notice.style.display = 'block';
            }
        }

        function initTiny() {
            if (!window.tinymce) {
                showTextareaFallback('Rich editor could not load. You can edit in the textarea normally.');
                return;
            }

            window.tinymce.init({
                selector: '#seo_content',
                height: 460,
                menubar: 'file edit view insert format tools table',
                plugins: 'advlist autolink lists link image media table code fullscreen',
                toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code fullscreen',
                branding: false,
                promotion: false,
                statusbar: true,
                setup: function (editor) {
                    editor.on('change input undo redo keyup', function () {
                        editor.save();
                    });

                    editor.on('init', function () {
                        const body = editor.getBody();
                        const isReadOnlyMode = (editor.mode && typeof editor.mode.isReadOnly === 'function' && editor.mode.isReadOnly()) || (body && body.getAttribute('contenteditable') === 'false');
                        if (isReadOnlyMode) {
                            editor.remove();
                            showTextareaFallback('Rich editor is in read-only mode on this domain. Use the textarea to edit content, or configure a TinyMCE API key.');
                        }
                    });
                }
            }).catch(function () {
                showTextareaFallback('Rich editor failed to initialize. You can still edit content in the textarea.');
            });
        }

        const script = document.createElement('script');
        script.src = 'https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js';
        script.referrerPolicy = 'origin';
        script.onload = initTiny;
        script.onerror = function () {
            showTextareaFallback('Rich editor script failed to load. You can still edit content in the textarea.');
        };
        document.body.appendChild(script);
    })();
</script>
</body>
</html>
