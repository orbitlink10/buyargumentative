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
        :root { --accent:#1d7bff; --dark:#1c1c28; --muted:#6b6b7a; --border:#dce1ea; --bg:#f7f8fb; --card:#ffffff; --err:#bf2323; }
        *{box-sizing:border-box;}
        body{margin:0;font-family:'Manrope',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--dark);}
        .layout{display:grid;grid-template-columns:240px 1fr;min-height:100vh;}
        .sidebar{background:#fff;border-right:1px solid var(--border);padding:24px;display:grid;gap:26px;}
        .brand{display:flex;align-items:center;gap:12px;font-size:24px;font-weight:800;}
        .brand .icon{width:44px;height:44px;border-radius:14px;background:var(--accent);display:grid;place-items:center;color:#fff;font-size:22px;}
        .nav-group{display:grid;gap:8px;}
        .nav-title{font-size:12px;letter-spacing:0.4px;text-transform:uppercase;color:var(--muted);font-weight:800;}
        .nav-link{display:flex;align-items:center;gap:10px;padding:12px 14px;border-radius:12px;color:#2f3236;font-weight:800;text-decoration:none;}
        .nav-link.active,.nav-link:hover{background:#eaf3ff;color:#1d7bff;}
        .content{padding:26px 30px 40px;display:grid;gap:16px;}
        .topbar{display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;}
        .btn{border:1px solid transparent;border-radius:10px;padding:10px 12px;font-weight:900;cursor:pointer;text-decoration:none;background:#fff;color:#2f3236;}
        .btn-primary{background:var(--accent);color:#fff;box-shadow:0 12px 25px rgba(29,123,255,0.26);}
        .card{background:var(--card);border:1px solid var(--border);border-radius:12px;overflow:hidden;}
        .card-head{background:#1d7bff;color:#fff;padding:16px 20px;font-size:30px;font-weight:900;}
        .card-body{padding:20px;display:grid;gap:16px;}
        .field{display:grid;gap:8px;}
        .field label{font-size:16px;font-weight:800;color:#1d2433;}
        .field input,.field select,.field textarea{
            width:100%;
            border:1px solid #cad2df;
            border-radius:10px;
            padding:12px 14px;
            font:inherit;
            font-size:15px;
            color:#263041;
            background:#fff;
        }
        .field textarea{min-height:240px;resize:vertical;}
        .grid{display:grid;gap:14px;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));}
        .full{grid-column:1/-1;}
        .error{padding:10px 12px;border-radius:10px;background:#fff0f0;border:1px solid #ffd5d5;color:var(--err);font-weight:800;}
        .actions{display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap;}
        .hint{color:var(--muted);font-size:13px;font-weight:700;}
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
                <div style="font-size:14px; color:var(--muted); font-weight:700;">Manage Pages</div>
                <div style="font-size:28px; font-weight:900;">{{ $mode === 'edit' ? 'Update Post' : 'Add New Post' }}</div>
            </div>
            <a class="btn" href="{{ route('admin.pages') }}">Back to List</a>
        </div>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <div class="card">
            <div class="card-head">{{ $mode === 'edit' ? 'Edit Post' : 'Add New Post' }}</div>
            <form
                class="card-body"
                action="{{ $mode === 'edit' ? route('admin.pages.update', ['id' => $pageData['id']]) : route('admin.pages.store') }}"
                method="POST"
            >
                @csrf
                <div class="grid">
                    <div class="field">
                        <label for="meta_title">Meta Title</label>
                        <input id="meta_title" name="meta_title" type="text" placeholder="Enter Meta Title" value="{{ old('meta_title', $pageData['meta_title'] ?? '') }}" required>
                    </div>
                    <div class="field">
                        <label for="meta_description">Meta Description</label>
                        <input id="meta_description" name="meta_description" type="text" placeholder="Enter Meta Description" value="{{ old('meta_description', $pageData['meta_description'] ?? '') }}" required>
                    </div>
                    <div class="field">
                        <label for="page_title">Page Title</label>
                        <input id="page_title" name="page_title" type="text" placeholder="Enter Keyword Title" value="{{ old('page_title', $pageData['page_title'] ?? '') }}" required>
                    </div>
                    <div class="field">
                        <label for="image_alt_text">Image Alt Text</label>
                        <input id="image_alt_text" name="image_alt_text" type="text" placeholder="Enter Image Alt Text" value="{{ old('image_alt_text', $pageData['image_alt_text'] ?? '') }}" required>
                    </div>
                    <div class="field">
                        <label for="heading_two">Heading 2</label>
                        <input id="heading_two" name="heading_two" type="text" placeholder="Enter Heading 2" value="{{ old('heading_two', $pageData['heading_two'] ?? '') }}" required>
                    </div>
                    <div class="field">
                        <label for="type">Type</label>
                        <select id="type" name="type" required>
                            <option value="Post" @selected(old('type', $pageData['type'] ?? 'Post') === 'Post')>Post</option>
                            <option value="Page" @selected(old('type', $pageData['type'] ?? 'Post') === 'Page')>Page</option>
                        </select>
                    </div>
                    <div class="field full">
                        <label for="feature_image">Feature Image URL</label>
                        <input id="feature_image" name="feature_image" type="url" placeholder="https://example.com/image.jpg" value="{{ old('feature_image', $pageData['feature_image'] ?? '') }}">
                    </div>
                    <div class="field full">
                        <label for="description">Page Description</label>
                        <textarea id="description" name="description" placeholder="Write page content here..." required>{{ old('description', $pageData['description'] ?? '') }}</textarea>
                        <div class="hint">Rich-text HTML is supported if you paste formatted content.</div>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">{{ $mode === 'edit' ? 'Update Page' : 'Post Page' }}</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
