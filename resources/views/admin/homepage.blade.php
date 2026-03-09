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
        .seo-editor-shell{border:1px solid var(--border);border-radius:12px;overflow:hidden;background:#fff;}
        .seo-editor-shell.is-fullscreen{position:fixed;inset:12px;z-index:9999;box-shadow:0 28px 80px rgba(0,0,0,0.25);}
        .seo-editor-menu,.seo-editor-toolbar{display:flex;align-items:center;gap:6px;flex-wrap:wrap;padding:10px 12px;border-bottom:1px solid var(--border);background:#f9fafc;}
        .seo-editor-toolbar{background:#fff;}
        .seo-menu-btn,.seo-tool-btn{border:1px solid transparent;background:transparent;color:#334155;border-radius:8px;padding:6px 8px;font:inherit;font-size:14px;cursor:pointer;line-height:1;}
        .seo-menu-btn:hover,.seo-tool-btn:hover{background:#eef2f7;border-color:#dde3ec;}
        .seo-tool-btn.is-active{background:#eaf3ff;border-color:#bfdbfe;color:#1d4ed8;}
        .seo-sep{width:1px;height:22px;background:#dbe2ea;margin:0 2px;}
        .seo-editor-area{min-height:420px;max-height:720px;overflow:auto;padding:16px;font-size:20px;line-height:1.72;color:#0f172a;outline:none;}
        .seo-editor-area h1,.seo-editor-area h2,.seo-editor-area h3{line-height:1.2;margin:0 0 10px;}
        .seo-editor-area p{margin:0 0 14px;}
        .seo-editor-area ul,.seo-editor-area ol{margin:0 0 14px 20px;}
        .seo-editor-area:empty:before{content:attr(data-placeholder);color:#8b97a7;}
        .seo-source{display:none;border:0;border-top:1px solid var(--border);border-radius:0;min-height:420px;resize:vertical;font-family:Consolas,'Courier New',monospace;font-size:14px;padding:16px;}
        .seo-editor-shell.is-source .seo-editor-area{display:none;}
        .seo-editor-shell.is-source .seo-source{display:block;}
        .seo-editor-footer{display:flex;justify-content:space-between;align-items:center;gap:10px;padding:8px 12px;border-top:1px solid var(--border);background:#f9fafc;color:#64748b;font-size:12px;font-weight:700;}
        .ok{background:#e7f8ee;color:#1f9b55;padding:10px 12px;border-radius:10px;font-weight:800;}
        .err{background:#fde9e9;color:#c53030;padding:10px 12px;border-radius:10px;font-weight:800;}
        .hint{font-size:13px;color:var(--muted);font-weight:700;}
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
                    <textarea id="seo_content" name="seo_content" class="seo-editor" placeholder="Write SEO content here..." style="display:none;">{{ old('seo_content', $homeContent['seo_content'] ?? '') }}</textarea>
                    <div id="seoEditorShell" class="seo-editor-shell">
                        <div class="seo-editor-menu">
                            <button type="button" class="seo-menu-btn" data-action="undo">File</button>
                            <button type="button" class="seo-menu-btn" data-action="undo">Edit</button>
                            <button type="button" class="seo-menu-btn" data-action="undo">View</button>
                            <button type="button" class="seo-menu-btn" data-action="undo">Insert</button>
                            <button type="button" class="seo-menu-btn" data-action="undo">Format</button>
                            <button type="button" class="seo-menu-btn" data-action="undo">Tools</button>
                            <button type="button" class="seo-menu-btn" data-action="undo">Table</button>
                        </div>
                        <div class="seo-editor-toolbar">
                            <button type="button" class="seo-tool-btn" data-cmd="undo" title="Undo">Undo</button>
                            <button type="button" class="seo-tool-btn" data-cmd="redo" title="Redo">Redo</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-cmd="bold" title="Bold"><b>B</b></button>
                            <button type="button" class="seo-tool-btn" data-cmd="italic" title="Italic"><i>I</i></button>
                            <button type="button" class="seo-tool-btn" data-cmd="underline" title="Underline"><u>U</u></button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyLeft" title="Align left">Left</button>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyCenter" title="Align center">Center</button>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyRight" title="Align right">Right</button>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyFull" title="Justify">Justify</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-cmd="insertUnorderedList" title="Bulleted list">List</button>
                            <button type="button" class="seo-tool-btn" data-cmd="insertOrderedList" title="Numbered list">1.</button>
                            <button type="button" class="seo-tool-btn" data-cmd="outdent" title="Outdent">Out</button>
                            <button type="button" class="seo-tool-btn" data-cmd="indent" title="Indent">In</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-action="link" title="Insert link">Link</button>
                            <button type="button" class="seo-tool-btn" data-action="image" title="Insert image">Image</button>
                            <button type="button" class="seo-tool-btn" data-action="removeFormat" title="Clear formatting">Clear</button>
                            <button type="button" class="seo-tool-btn" data-action="code" title="HTML source">Code</button>
                            <button type="button" class="seo-tool-btn" data-action="fullscreen" title="Fullscreen">Full</button>
                        </div>
                        <div id="seo_content_editor" class="seo-editor-area" contenteditable="true" data-placeholder="Write SEO content here..."></div>
                        <textarea id="seo_content_source" class="seo-source" spellcheck="false"></textarea>
                        <div class="seo-editor-footer">
                            <span>Self-hosted editor (no API key)</span>
                            <span id="seo_word_count">0 words</span>
                        </div>
                    </div>
                    <div class="hint">Long-form SEO content supports plain text or HTML formatting.</div>
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
        const shell = document.getElementById('seoEditorShell');
        const editor = document.getElementById('seo_content_editor');
        const source = document.getElementById('seo_content_source');
        const wordCount = document.getElementById('seo_word_count');
        const form = document.getElementById('homepageContentForm');

        if (!textarea || !shell || !editor || !source || !form) {
            return;
        }

        function updateWordCount(html) {
            const text = (html || '')
                .replace(/<[^>]*>/g, ' ')
                .replace(/&nbsp;/g, ' ')
                .replace(/\s+/g, ' ')
                .trim();
            const count = text ? text.split(' ').length : 0;
            wordCount.textContent = count + ' words';
        }

        function syncToTextarea() {
            if (shell.classList.contains('is-source')) {
                textarea.value = source.value;
                updateWordCount(source.value);
            } else {
                textarea.value = editor.innerHTML;
                updateWordCount(editor.innerHTML);
            }
        }

        function runCommand(cmd) {
            editor.focus();
            document.execCommand(cmd, false, null);
            syncToTextarea();
        }

        function runAction(action) {
            if (action === 'link') {
                const url = window.prompt('Enter URL');
                if (url) {
                    editor.focus();
                    document.execCommand('createLink', false, url);
                }
            } else if (action === 'image') {
                const url = window.prompt('Enter image URL');
                if (url) {
                    editor.focus();
                    document.execCommand('insertImage', false, url);
                }
            } else if (action === 'removeFormat') {
                editor.focus();
                document.execCommand('removeFormat', false, null);
            } else if (action === 'code') {
                if (shell.classList.contains('is-source')) {
                    editor.innerHTML = source.value;
                    shell.classList.remove('is-source');
                } else {
                    source.value = editor.innerHTML;
                    shell.classList.add('is-source');
                }
            } else if (action === 'fullscreen') {
                shell.classList.toggle('is-fullscreen');
                document.body.style.overflow = shell.classList.contains('is-fullscreen') ? 'hidden' : '';
            } else {
                runCommand('undo');
            }
            syncToTextarea();
        }

        shell.querySelectorAll('[data-cmd]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                runCommand(btn.getAttribute('data-cmd'));
            });
        });

        shell.querySelectorAll('[data-action]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                runAction(btn.getAttribute('data-action'));
            });
        });

        editor.addEventListener('input', syncToTextarea);
        source.addEventListener('input', syncToTextarea);

        form.addEventListener('submit', function () {
            syncToTextarea();
        });

        editor.innerHTML = textarea.value || '';
        syncToTextarea();
    })();
</script>
</body>
</html>
