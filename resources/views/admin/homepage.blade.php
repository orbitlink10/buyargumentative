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
        .seo-menu-btn.is-open{background:#eef2f7;border-color:#dde3ec;}
        .seo-format-panel{display:none;gap:8px;flex-wrap:wrap;padding:10px 12px;border-bottom:1px solid var(--border);background:#fffaf0;}
        .seo-format-panel.is-open{display:flex;}
        .seo-format-btn{border:1px solid #dce4ef;background:#fff;color:#334155;border-radius:8px;padding:6px 10px;font:inherit;font-size:13px;font-weight:700;cursor:pointer;line-height:1;}
        .seo-format-btn:hover{background:#eef2f7;}
        .seo-format-btn.is-active{background:#eaf3ff;border-color:#bfdbfe;color:#1d4ed8;}
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
                            <button type="button" class="seo-menu-btn">File</button>
                            <button type="button" class="seo-menu-btn">Edit</button>
                            <button type="button" class="seo-menu-btn">View</button>
                            <button type="button" class="seo-menu-btn">Insert</button>
                            <button type="button" class="seo-menu-btn" id="seoFormatMenuBtn" data-menu="format">Format</button>
                            <button type="button" class="seo-menu-btn">Tools</button>
                            <button type="button" class="seo-menu-btn">Table</button>
                        </div>
                        <div id="seoFormatPanel" class="seo-format-panel">
                            <button type="button" class="seo-format-btn" data-format="P">Paragraph</button>
                            <button type="button" class="seo-format-btn" data-format="H1">Heading 1</button>
                            <button type="button" class="seo-format-btn" data-format="H2">Heading 2</button>
                            <button type="button" class="seo-format-btn" data-format="H3">Heading 3</button>
                            <button type="button" class="seo-format-btn" data-format="H4">Heading 4</button>
                            <button type="button" class="seo-format-btn" data-format="H5">Heading 5</button>
                            <button type="button" class="seo-format-btn" data-format="H6">Heading 6</button>
                            <button type="button" class="seo-format-btn" data-format="BLOCKQUOTE">Quote</button>
                        </div>
                        <div class="seo-editor-toolbar">
                            <button type="button" class="seo-tool-btn" data-cmd="undo" title="Undo">&#8630;</button>
                            <button type="button" class="seo-tool-btn" data-cmd="redo" title="Redo">&#8631;</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-cmd="bold" title="Bold"><b>B</b></button>
                            <button type="button" class="seo-tool-btn" data-cmd="italic" title="Italic"><i>I</i></button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyLeft" data-state-cmd="justifyLeft" title="Align left">&#9776;</button>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyCenter" data-state-cmd="justifyCenter" title="Align center">&#8801;</button>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyRight" data-state-cmd="justifyRight" title="Align right">&#9776;</button>
                            <button type="button" class="seo-tool-btn" data-cmd="justifyFull" data-state-cmd="justifyFull" title="Justify">&#8803;</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-cmd="outdent" title="Outdent">&#8676;</button>
                            <button type="button" class="seo-tool-btn" data-cmd="indent" title="Indent">&#8677;</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-action="link" title="Insert link">&#9901;</button>
                            <button type="button" class="seo-tool-btn" data-action="image" title="Insert image">&#9635;</button>
                            <button type="button" class="seo-tool-btn" data-action="media" title="Insert media">&#9654;</button>
                            <span class="seo-sep"></span>
                            <button type="button" class="seo-tool-btn" data-action="code" title="HTML source">&lt;&gt;</button>
                            <button type="button" class="seo-tool-btn" data-action="fullscreen" title="Fullscreen">&#9974;</button>
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
        const formatMenuBtn = document.getElementById('seoFormatMenuBtn');
        const formatPanel = document.getElementById('seoFormatPanel');
        const formatButtons = shell ? shell.querySelectorAll('[data-format]') : [];

        if (!textarea || !shell || !editor || !source || !form || !formatMenuBtn || !formatPanel) {
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
            if (shell.classList.contains('is-source')) {
                return;
            }
            editor.focus();
            document.execCommand(cmd, false, null);
            syncToTextarea();
            syncToolbarState();
        }

        function applyBlockFormat(tag) {
            if (shell.classList.contains('is-source')) {
                return;
            }
            editor.focus();
            const value = (tag || 'P').toUpperCase();
            if (value === 'P') {
                document.execCommand('formatBlock', false, 'P');
            } else if (value === 'BLOCKQUOTE') {
                document.execCommand('formatBlock', false, 'BLOCKQUOTE');
            } else {
                document.execCommand('formatBlock', false, value);
            }
            syncToTextarea();
            syncToolbarState();
        }

        function getSelectionTag() {
            const selection = window.getSelection();
            if (!selection || selection.rangeCount === 0) {
                return 'P';
            }
            let node = selection.anchorNode;
            if (!node) {
                return 'P';
            }
            if (node.nodeType === Node.TEXT_NODE) {
                node = node.parentElement;
            }
            while (node && node !== editor) {
                const tag = (node.tagName || '').toUpperCase();
                if (['H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'P', 'BLOCKQUOTE'].includes(tag)) {
                    return tag;
                }
                node = node.parentElement;
            }
            return 'P';
        }

        function syncToolbarState() {
            const activeByCommand = ['bold', 'italic', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'];
            shell.querySelectorAll('[data-state-cmd], [data-cmd]').forEach(function (btn) {
                const cmd = btn.getAttribute('data-state-cmd') || btn.getAttribute('data-cmd');
                if (!cmd || !activeByCommand.includes(cmd)) {
                    btn.classList.remove('is-active');
                    return;
                }
                try {
                    btn.classList.toggle('is-active', document.queryCommandState(cmd));
                } catch (e) {
                    btn.classList.remove('is-active');
                }
            });

            const tag = getSelectionTag();
            formatButtons.forEach(function (btn) {
                btn.classList.toggle('is-active', btn.getAttribute('data-format') === tag);
            });
        }

        function closeFormatPanel() {
            formatPanel.classList.remove('is-open');
            formatMenuBtn.classList.remove('is-open');
        }

        function toggleFormatPanel() {
            const open = formatPanel.classList.toggle('is-open');
            formatMenuBtn.classList.toggle('is-open', open);
        }

        function runAction(action) {
            if (action === 'code') {
                if (shell.classList.contains('is-source')) {
                    editor.innerHTML = source.value;
                    shell.classList.remove('is-source');
                } else {
                    source.value = editor.innerHTML;
                    shell.classList.add('is-source');
                }
                syncToTextarea();
                syncToolbarState();
                return;
            }

            if (action === 'fullscreen') {
                shell.classList.toggle('is-fullscreen');
                document.body.style.overflow = shell.classList.contains('is-fullscreen') ? 'hidden' : '';
                return;
            }

            if (shell.classList.contains('is-source')) {
                return;
            }

            if (action === 'link') {
                const url = window.prompt('Enter URL');
                if (url) {
                    editor.focus();
                    document.execCommand('createLink', false, url.trim());
                }
            } else if (action === 'image') {
                const url = window.prompt('Enter image URL');
                if (url) {
                    editor.focus();
                    document.execCommand('insertImage', false, url.trim());
                }
            } else if (action === 'media') {
                const value = window.prompt('Enter video URL or iframe embed code');
                if (value) {
                    const media = value.trim();
                    editor.focus();
                    if (/^<iframe/i.test(media)) {
                        document.execCommand('insertHTML', false, media);
                    } else if (/\.(mp4|webm|ogg)(\?.*)?$/i.test(media)) {
                        const safe = media.replace(/"/g, '&quot;');
                        document.execCommand('insertHTML', false, '<video controls src="' + safe + '" style="max-width:100%;"></video>');
                    } else {
                        const safeUrl = media.replace(/"/g, '&quot;');
                        document.execCommand('insertHTML', false, '<a href="' + safeUrl + '" target="_blank" rel="noopener">' + safeUrl + '</a>');
                    }
                }
            }

            syncToTextarea();
            syncToolbarState();
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

        formatMenuBtn.addEventListener('click', function (event) {
            event.stopPropagation();
            toggleFormatPanel();
        });

        formatButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                applyBlockFormat(btn.getAttribute('data-format'));
                closeFormatPanel();
            });
        });

        document.addEventListener('click', function (event) {
            if (!formatPanel.contains(event.target) && event.target !== formatMenuBtn) {
                closeFormatPanel();
            }
        });

        editor.addEventListener('input', syncToTextarea);
        editor.addEventListener('keyup', syncToolbarState);
        editor.addEventListener('mouseup', syncToolbarState);
        editor.addEventListener('focus', syncToolbarState);
        source.addEventListener('input', syncToTextarea);

        document.addEventListener('selectionchange', function () {
            if (!shell.classList.contains('is-source')) {
                syncToolbarState();
            }
        });

        form.addEventListener('submit', function () {
            syncToTextarea();
        });

        editor.innerHTML = textarea.value || '';
        syncToTextarea();
        syncToolbarState();
    })();
</script>
</body>
</html>
