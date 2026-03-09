<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mode === 'edit' ? 'Edit Page' : 'Add Page' }} | Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--accent:#f25c3c;--dark:#1c1c28;--muted:#6b6b7a;--border:#e5e8ed;--bg:#f7f8fb;--err:#bf2323;}
        *{box-sizing:border-box;}
        body{margin:0;font-family:'Manrope',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--dark);}
        .layout{display:grid;grid-template-columns:240px 1fr;min-height:100vh;}
        .sidebar{background:#fff;border-right:1px solid var(--border);padding:24px;display:grid;gap:26px;}
        .brand{display:flex;align-items:center;gap:12px;font-size:24px;font-weight:800;}
        .brand .icon{width:44px;height:44px;border-radius:14px;background:var(--accent);display:grid;place-items:center;color:#fff;font-size:22px;}
        .nav-group{display:grid;gap:8px;}
        .nav-title{font-size:12px;letter-spacing:.4px;text-transform:uppercase;color:var(--muted);font-weight:800;}
        .nav-link{display:flex;align-items:center;gap:10px;padding:12px 14px;border-radius:12px;color:#2f3236;font-weight:800;text-decoration:none;}
        .nav-link.active,.nav-link:hover{background:#fff2ec;color:var(--accent);}
        .content{padding:24px 28px 40px;display:grid;gap:16px;}
        .topbar{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;padding:16px 18px;border:1px solid var(--border);border-radius:14px;background:#fff;box-shadow:0 14px 35px rgba(15,23,42,.04);}
        .btn{border:none;border-radius:10px;padding:10px 12px;font-weight:900;cursor:pointer;text-decoration:none;}
        .btn-primary{background:var(--accent);color:#fff;box-shadow:0 10px 25px rgba(242,92,60,.25);}
        .btn-ghost{background:#fff;color:#334155;border:1px solid var(--border);}
        .card{background:#fff;border:1px solid var(--border);border-radius:14px;padding:18px;box-shadow:0 18px 44px rgba(15,23,42,.04);}
        .panel{border:1px solid var(--border);border-radius:12px;padding:14px;background:#fcfdff;}
        .panel + .panel{margin-top:14px;}
        .panel-head{display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap;margin-bottom:10px;}
        .panel-title{font-size:14px;font-weight:900;text-transform:uppercase;letter-spacing:.5px;color:#374151;}
        .panel-sub{font-size:12px;color:#6b7280;font-weight:700;}
        .grid{display:grid;gap:12px;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));}
        .field{display:grid;gap:6px;}
        .field.full{grid-column:1/-1;}
        .field label{font-size:12px;text-transform:uppercase;letter-spacing:.3px;color:var(--muted);font-weight:800;}
        .field input,.field select,.field textarea{width:100%;border:1px solid var(--border);border-radius:10px;padding:11px 12px;font:inherit;font-size:14px;background:#fff;color:var(--dark);}
        .field input:focus,.field select:focus,.field textarea:focus{outline:none;border-color:#f0b7a9;box-shadow:0 0 0 4px rgba(242,92,60,.14);}
        .error{padding:10px 12px;border-radius:10px;background:#fff0f0;border:1px solid #ffd5d5;color:var(--err);font-weight:800;}
        .actions{display:flex;justify-content:flex-end;position:sticky;bottom:8px;background:linear-gradient(180deg,rgba(247,248,251,0),rgba(247,248,251,.96) 30%);padding-top:10px;}
        .hint{font-size:13px;color:var(--muted);font-weight:700;}
        .editor-shell{border:1px solid var(--border);border-radius:12px;overflow:hidden;background:#fff;}
        .editor-shell.is-fullscreen{position:fixed;inset:12px;z-index:9999;box-shadow:0 28px 80px rgba(0,0,0,.25);}
        .editor-menu,.editor-tools{display:flex;align-items:center;gap:6px;flex-wrap:wrap;padding:10px 12px;border-bottom:1px solid var(--border);background:#f9fafc;}
        .editor-tools{background:#fff;}
        .menu-btn,.tool-btn,.format-btn{border:1px solid transparent;background:transparent;color:#334155;border-radius:8px;padding:6px 8px;font:inherit;font-size:14px;cursor:pointer;line-height:1;}
        .menu-btn:hover,.tool-btn:hover,.format-btn:hover{background:#eef2f7;border-color:#dde3ec;}
        .tool-btn.is-active,.format-btn.is-active{background:#eaf3ff;border-color:#bfdbfe;color:#1d4ed8;}
        .menu-btn.is-open{background:#eef2f7;border-color:#dde3ec;}
        .format-wrap{display:none;gap:8px;flex-wrap:wrap;padding:10px 12px;border-bottom:1px solid var(--border);background:#fffaf0;}
        .format-wrap.is-open{display:flex;}
        .sep{width:1px;height:22px;background:#dbe2ea;margin:0 2px;}
        .editor-area{min-height:460px;max-height:760px;overflow:auto;padding:16px;font-size:18px;line-height:1.72;color:#0f172a;outline:none;}
        .editor-area h1,.editor-area h2,.editor-area h3,.editor-area h4,.editor-area h5,.editor-area h6{line-height:1.25;margin:0 0 10px;color:#0f172a;}
        .editor-area h1{font-size:34px;}
        .editor-area h2{font-size:30px;}
        .editor-area h3{font-size:26px;}
        .editor-area h4{font-size:22px;}
        .editor-area h5{font-size:20px;}
        .editor-area h6{font-size:18px;}
        .editor-area p{margin:0 0 14px;}
        .editor-area ul,.editor-area ol{margin:0 0 14px 20px;}
        .editor-area:empty:before{content:attr(data-placeholder);color:#8b97a7;}
        .editor-source{display:none;border:0;border-top:1px solid var(--border);border-radius:0;min-height:460px;resize:vertical;font-family:Consolas,'Courier New',monospace;font-size:14px;padding:16px;}
        .editor-shell.is-source .editor-area{display:none;}
        .editor-shell.is-source .editor-source{display:block;}
        .editor-footer{display:flex;justify-content:space-between;align-items:center;gap:10px;padding:8px 12px;border-top:1px solid var(--border);background:#f9fafc;color:#64748b;font-size:12px;font-weight:700;}
        .dialog{position:fixed;inset:0;background:rgba(15,23,42,.48);display:none;align-items:center;justify-content:center;z-index:10000;padding:16px;}
        .dialog.is-open{display:flex;}
        .dialog-card{width:min(560px,100%);background:#fff;border:1px solid var(--border);border-radius:14px;box-shadow:0 30px 80px rgba(15,23,42,.35);padding:16px;display:grid;gap:12px;}
        .dialog-title{font-size:18px;font-weight:900;color:#0f172a;}
        .dialog-grid{display:grid;gap:10px;}
        .dialog-row{display:grid;gap:6px;}
        .dialog-row label{font-size:12px;text-transform:uppercase;letter-spacing:.3px;color:#6b7280;font-weight:800;}
        .dialog-row input[type=\"text\"],.dialog-row input[type=\"url\"]{width:100%;border:1px solid var(--border);border-radius:10px;padding:10px 12px;font:inherit;font-size:14px;}
        .dialog-row input:focus{outline:none;border-color:#f0b7a9;box-shadow:0 0 0 4px rgba(242,92,60,.12);}
        .dialog-check{display:flex;align-items:center;gap:8px;font-size:14px;color:#374151;font-weight:700;}
        .dialog-actions{display:flex;justify-content:flex-end;gap:8px;flex-wrap:wrap;}
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
            <a class="nav-link" href="{{ route('admin.homepage') }}">Homepage Content</a>
            <a class="nav-link active" href="{{ route('admin.pages') }}">Pages</a>
        </div>
        <div class="nav-group">
            <div class="nav-title">Account</div>
            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </aside>

    <main class="content">
        <div class="topbar">
            <div>
                <div style="font-size:14px;color:var(--muted);font-weight:700;">Manage Pages</div>
                <div style="font-size:24px;font-weight:900;">{{ $mode === 'edit' ? 'Update Post' : 'Add New Post' }}</div>
            </div>
            <div style="display:flex;gap:8px;flex-wrap:wrap;">
                <a class="btn btn-ghost" href="{{ route('admin.pages') }}">Back to List</a>
                <button form="pageForm" type="submit" class="btn btn-primary">{{ $mode === 'edit' ? 'Update Page' : 'Post Page' }}</button>
            </div>
        </div>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form id="pageForm" class="card" action="{{ $mode === 'edit' ? route('admin.pages.update', ['id' => $pageData['id']]) : route('admin.pages.store') }}" method="POST">
            @csrf
            <section class="panel">
                <div class="panel-head">
                    <div class="panel-title">SEO Basics</div>
                    <div class="panel-sub">Metadata used by search engines and page previews.</div>
                </div>
                <div class="grid">
                    <div class="field"><label for="meta_title">Meta Title</label><input id="meta_title" name="meta_title" type="text" value="{{ old('meta_title', $pageData['meta_title'] ?? '') }}" required></div>
                    <div class="field"><label for="meta_description">Meta Description</label><input id="meta_description" name="meta_description" type="text" value="{{ old('meta_description', $pageData['meta_description'] ?? '') }}" required></div>
                    <div class="field"><label for="page_title">Page Title</label><input id="page_title" name="page_title" type="text" value="{{ old('page_title', $pageData['page_title'] ?? '') }}" required></div>
                    <div class="field">
                        <label for="type">Type</label>
                        <select id="type" name="type" required>
                            <option value="Post" @selected(old('type', $pageData['type'] ?? 'Post') === 'Post')>Post</option>
                            <option value="Page" @selected(old('type', $pageData['type'] ?? 'Post') === 'Page')>Page</option>
                        </select>
                    </div>
                </div>
            </section>

            <section class="panel">
                <div class="panel-head">
                    <div class="panel-title">Page Content</div>
                    <div class="panel-sub">Self-hosted editor with headings, hyperlinks, and source mode.</div>
                </div>
                <div class="grid">
                    <div class="field"><label for="image_alt_text">Image Alt Text</label><input id="image_alt_text" name="image_alt_text" type="text" value="{{ old('image_alt_text', $pageData['image_alt_text'] ?? '') }}" required></div>
                    <div class="field"><label for="heading_two">Heading 2</label><input id="heading_two" name="heading_two" type="text" value="{{ old('heading_two', $pageData['heading_two'] ?? '') }}" required></div>
                    <div class="field full"><label for="feature_image">Feature Image URL</label><input id="feature_image" name="feature_image" type="url" value="{{ old('feature_image', $pageData['feature_image'] ?? '') }}"></div>
                    <div class="field full">
                        <label for="description">Page Description</label>
                        <textarea id="description" name="description" style="display:none;">{{ old('description', $pageData['description'] ?? '') }}</textarea>
                        <div id="pageEditorShell" class="editor-shell">
                            <div class="editor-menu">
                                <button type="button" class="menu-btn">File</button><button type="button" class="menu-btn">Edit</button><button type="button" class="menu-btn">View</button><button type="button" class="menu-btn">Insert</button>
                                <button type="button" class="menu-btn" id="pageFormatMenuBtn">Format</button><button type="button" class="menu-btn">Tools</button><button type="button" class="menu-btn">Table</button>
                            </div>
                            <div id="pageFormatPanel" class="format-wrap">
                                <button type="button" class="format-btn" data-format="P">Paragraph</button><button type="button" class="format-btn" data-format="H1">Heading 1</button><button type="button" class="format-btn" data-format="H2">Heading 2</button>
                                <button type="button" class="format-btn" data-format="H3">Heading 3</button><button type="button" class="format-btn" data-format="H4">Heading 4</button><button type="button" class="format-btn" data-format="H5">Heading 5</button>
                                <button type="button" class="format-btn" data-format="H6">Heading 6</button><button type="button" class="format-btn" data-format="BLOCKQUOTE">Quote</button>
                            </div>
                            <div class="editor-tools">
                                <button type="button" class="tool-btn" data-cmd="undo">Undo</button><button type="button" class="tool-btn" data-cmd="redo">Redo</button><span class="sep"></span>
                                <button type="button" class="tool-btn" data-cmd="bold"><b>B</b></button><button type="button" class="tool-btn" data-cmd="italic"><i>I</i></button><button type="button" class="tool-btn" data-cmd="underline"><u>U</u></button><span class="sep"></span>
                                <button type="button" class="tool-btn" data-cmd="insertUnorderedList" data-state-cmd="insertUnorderedList">UL</button><button type="button" class="tool-btn" data-cmd="insertOrderedList" data-state-cmd="insertOrderedList">OL</button>
                                <button type="button" class="tool-btn" data-cmd="outdent">Out</button><button type="button" class="tool-btn" data-cmd="indent">In</button><span class="sep"></span>
                                <button type="button" class="tool-btn" data-action="link">Link</button><button type="button" class="tool-btn" data-action="image">Img</button><button type="button" class="tool-btn" data-action="media">Vid</button><span class="sep"></span>
                                <button type="button" class="tool-btn" data-action="code">&lt;&gt;</button><button type="button" class="tool-btn" data-action="fullscreen">[]</button>
                            </div>
                            <div id="description_editor" class="editor-area" contenteditable="true" data-placeholder="Write page content here..."></div>
                            <textarea id="description_source" class="editor-source" spellcheck="false"></textarea>
                            <div class="editor-footer"><span>Self-hosted editor (no API key)</span><span id="description_word_count">0 words</span></div>
                        </div>
                        <div class="hint">Tip: use Format menu to apply Heading 1 to Heading 6.</div>
                    </div>
                </div>
            </section>

            <div class="actions"><button type="submit" class="btn btn-primary">{{ $mode === 'edit' ? 'Update Page' : 'Post Page' }}</button></div>
        </form>
    </main>
</div>

<div id="pageLinkDialog" class="dialog" aria-hidden="true">
    <div class="dialog-card" role="dialog" aria-modal="true" aria-labelledby="pageLinkDialogTitle">
        <div id="pageLinkDialogTitle" class="dialog-title">Insert Hyperlink</div>
        <div class="dialog-grid">
            <div class="dialog-row"><label for="page_link_url">URL</label><input id="page_link_url" type="url" placeholder="https://example.com"></div>
            <div class="dialog-row"><label for="page_link_text">Link Text</label><input id="page_link_text" type="text" placeholder="Visible text (optional)"></div>
            <label class="dialog-check"><input id="page_link_new_tab" type="checkbox"> Open link in a new tab</label>
        </div>
        <div class="dialog-actions"><button type="button" id="pageLinkCancel" class="btn btn-ghost">Cancel</button><button type="button" id="pageLinkApply" class="btn btn-primary">Apply Link</button></div>
    </div>
</div>

<script>
    (function () {
        const textarea = document.getElementById('description');
        const shell = document.getElementById('pageEditorShell');
        const editor = document.getElementById('description_editor');
        const source = document.getElementById('description_source');
        const wordCount = document.getElementById('description_word_count');
        const form = document.getElementById('pageForm');
        const formatBtn = document.getElementById('pageFormatMenuBtn');
        const formatPanel = document.getElementById('pageFormatPanel');
        const formatButtons = shell ? shell.querySelectorAll('[data-format]') : [];
        const linkDialog = document.getElementById('pageLinkDialog');
        const linkUrl = document.getElementById('page_link_url');
        const linkText = document.getElementById('page_link_text');
        const linkNewTab = document.getElementById('page_link_new_tab');
        const linkCancel = document.getElementById('pageLinkCancel');
        const linkApply = document.getElementById('pageLinkApply');
        let savedRange = null;

        if (!textarea || !shell || !editor || !source || !wordCount || !form || !formatBtn || !formatPanel || !linkDialog || !linkUrl || !linkText || !linkNewTab || !linkCancel || !linkApply) return;

        function words(html){const text=(html||'').replace(/<[^>]*>/g,' ').replace(/&nbsp;/g,' ').replace(/\s+/g,' ').trim();return text?text.split(' ').length:0;}
        function sync(){textarea.value=shell.classList.contains('is-source')?source.value:editor.innerHTML;wordCount.textContent=words(textarea.value)+' words';}
        function activeTag(){const s=window.getSelection();if(!s||!s.rangeCount)return'P';let n=s.anchorNode;if(n&&n.nodeType===Node.TEXT_NODE)n=n.parentElement;while(n&&n!==editor){const t=(n.tagName||'').toUpperCase();if(['P','H1','H2','H3','H4','H5','H6','BLOCKQUOTE'].includes(t))return t;n=n.parentElement;}return'P';}
        function state(){shell.querySelectorAll('[data-state-cmd],[data-cmd]').forEach(function(btn){const cmd=btn.getAttribute('data-state-cmd')||btn.getAttribute('data-cmd');if(!['bold','italic','underline','insertUnorderedList','insertOrderedList'].includes(cmd)){btn.classList.remove('is-active');return;}try{btn.classList.toggle('is-active',document.queryCommandState(cmd));}catch(e){btn.classList.remove('is-active');}});const t=activeTag();formatButtons.forEach(function(btn){btn.classList.toggle('is-active',btn.getAttribute('data-format')===t);});}
        function cmd(name){if(shell.classList.contains('is-source'))return;editor.focus();document.execCommand(name,false,null);sync();state();}
        function fmt(tag){
            if(shell.classList.contains('is-source'))return;
            editor.focus();
            const value=tag==='P'?'P':String(tag||'P').toUpperCase();
            document.execCommand('formatBlock',false,value);
            if(value!=='P'&&activeTag()!==value){
                document.execCommand('formatBlock',false,'<'+value+'>');
            }
            sync();
            state();
        }
        function saveRange(){const s=window.getSelection();if(!s||!s.rangeCount)return null;const r=s.getRangeAt(0);if(!editor.contains(r.commonAncestorContainer))return null;return r.cloneRange();}
        function restoreRange(r){if(!r)return;const s=window.getSelection();if(!s)return;s.removeAllRanges();s.addRange(r);}
        function closeDialog(){linkDialog.classList.remove('is-open');linkDialog.setAttribute('aria-hidden','true');editor.focus();}
        function applyLink(){const raw=linkUrl.value.trim();if(!raw)return;const label=linkText.value.trim();const url=/^(https?:|mailto:|tel:|\/)/i.test(raw)?raw:'https://'+raw;restoreRange(savedRange);editor.focus();if(label){const attrs=linkNewTab.checked?' target=\"_blank\" rel=\"noopener\"':'';document.execCommand('insertHTML',false,'<a href=\"'+url.replace(/\"/g,'&quot;')+'\"'+attrs+'>'+label.replace(/</g,'&lt;').replace(/>/g,'&gt;')+'</a>');}else{const sel=window.getSelection();const hasSel=!!(sel&&sel.toString().trim());if(hasSel){document.execCommand('createLink',false,url);}else{const attrs=linkNewTab.checked?' target=\"_blank\" rel=\"noopener\"':'';document.execCommand('insertHTML',false,'<a href=\"'+url.replace(/\"/g,'&quot;')+'\"'+attrs+'>'+url.replace(/</g,'&lt;').replace(/>/g,'&gt;')+'</a>');}}closeDialog();sync();state();}
        function act(name){
            if(name==='code'){if(shell.classList.contains('is-source')){editor.innerHTML=source.value;shell.classList.remove('is-source');}else{source.value=editor.innerHTML;shell.classList.add('is-source');}sync();return;}
            if(name==='fullscreen'){shell.classList.toggle('is-fullscreen');document.body.style.overflow=shell.classList.contains('is-fullscreen')?'hidden':'';return;}
            if(name==='link'){savedRange=saveRange();linkUrl.value='';linkText.value='';linkNewTab.checked=false;linkDialog.classList.add('is-open');linkDialog.setAttribute('aria-hidden','false');linkUrl.focus();return;}
            if(shell.classList.contains('is-source'))return;
            if(name==='image'){const u=window.prompt('Enter image URL');if(u)document.execCommand('insertImage',false,u.trim());}
            if(name==='media'){const m=window.prompt('Enter video URL or iframe embed code');if(m){const v=m.trim();if(/^<iframe/i.test(v)){document.execCommand('insertHTML',false,v);}else{document.execCommand('insertHTML',false,'<a href=\"'+v.replace(/\"/g,'&quot;')+'\" target=\"_blank\" rel=\"noopener\">'+v.replace(/</g,'&lt;').replace(/>/g,'&gt;')+'</a>');}}}
            sync();state();
        }

        shell.querySelectorAll('[data-cmd]').forEach(function(btn){btn.addEventListener('click',function(){cmd(btn.getAttribute('data-cmd'));});});
        shell.querySelectorAll('[data-action]').forEach(function(btn){btn.addEventListener('click',function(){act(btn.getAttribute('data-action'));});});
        formatButtons.forEach(function(btn){btn.addEventListener('click',function(){fmt(btn.getAttribute('data-format'));formatPanel.classList.remove('is-open');formatBtn.classList.remove('is-open');});});
        formatBtn.addEventListener('click',function(e){e.stopPropagation();const open=formatPanel.classList.toggle('is-open');formatBtn.classList.toggle('is-open',open);});
        document.addEventListener('click',function(e){if(!formatPanel.contains(e.target)&&e.target!==formatBtn){formatPanel.classList.remove('is-open');formatBtn.classList.remove('is-open');}});
        linkCancel.addEventListener('click',closeDialog);linkApply.addEventListener('click',applyLink);
        linkDialog.addEventListener('click',function(e){if(e.target===linkDialog)closeDialog();});
        linkUrl.addEventListener('keydown',function(e){if(e.key==='Enter'){e.preventDefault();applyLink();}});
        linkText.addEventListener('keydown',function(e){if(e.key==='Enter'){e.preventDefault();applyLink();}});
        document.addEventListener('keydown',function(e){if(e.key==='Escape'&&linkDialog.classList.contains('is-open'))closeDialog();});
        editor.addEventListener('input',sync);editor.addEventListener('keyup',state);editor.addEventListener('mouseup',state);source.addEventListener('input',sync);form.addEventListener('submit',sync);
        editor.innerHTML=textarea.value||'';sync();state();
    })();
</script>
</body>
</html>
