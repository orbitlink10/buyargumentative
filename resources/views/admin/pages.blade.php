<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pages | Buy Argumentative Essay</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --accent:#f25c3c; --dark:#1c1c28; --muted:#6b6b7a; --border:#e5e8ed; --bg:#f7f8fb; --card:#ffffff; --ok:#1a9b52; --warn:#f2a007; --info:#0c7bca; --danger:#d62d50; }
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
        .btn{border:1px solid transparent;border-radius:10px;padding:10px 12px;font-weight:900;cursor:pointer;text-decoration:none;background:#fff;color:#2f3236;}
        .btn-primary{background:var(--accent);color:#fff;box-shadow:0 12px 25px rgba(242,92,60,0.26);}
        .btn-info{border-color:#8fd0ff;color:var(--info);}
        .btn-warn{border-color:#ffd77a;color:#b37300;}
        .btn-danger{border-color:#ffb8c7;color:var(--danger);background:#fff;}
        .flash{background:#e8f8ee;border:1px solid #c6ead4;color:var(--ok);padding:10px 12px;border-radius:10px;font-weight:800;}
        .card{background:#fff;border:1px solid var(--border);border-radius:12px;overflow:hidden;}
        table{width:100%;border-collapse:collapse;}
        th,td{padding:12px;border-bottom:1px solid var(--border);text-align:left;font-size:14px;vertical-align:middle;}
        th{font-weight:900;color:#3e4550;background:#f5f7fb;text-transform:uppercase;font-size:12px;letter-spacing:0.6px;}
        .thumb{width:120px;height:72px;border-radius:8px;object-fit:cover;background:#eef1f6;border:1px solid #dde3ec;}
        .placeholder{width:120px;height:72px;border-radius:8px;background:#eef1f6;border:1px dashed #cfd7e2;display:grid;place-items:center;font-size:11px;color:#6f7885;font-weight:800;text-transform:uppercase;}
        .type{display:inline-flex;align-items:center;padding:5px 10px;border-radius:999px;background:#f2f4f8;font-size:12px;font-weight:800;color:#48505d;}
        .actions{display:flex;gap:8px;flex-wrap:wrap;}
        .empty{padding:24px;text-align:center;color:var(--muted);font-weight:700;}
        form.inline{display:inline;}
        @media(max-width:1000px){.layout{grid-template-columns:1fr;} .content{padding:20px;} .sidebar{gap:14px;} .topbar{align-items:flex-start;}}
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
                <div style="font-size:14px; color:var(--muted); font-weight:700;">Pages</div>
                <div style="font-size:28px; font-weight:900;">Manage Site Pages</div>
            </div>
            <a class="btn btn-primary" href="{{ route('admin.pages.create') }}">+ Add Page</a>
        </div>

        @if(session('page_saved'))
            <div class="flash">{{ session('page_saved') }}</div>
        @endif

        <div class="card">
            <table>
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Alt Text</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pages as $index => $page)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if(!empty($page['feature_image']))
                                <img class="thumb" src="{{ $page['feature_image'] }}" alt="{{ $page['image_alt_text'] ?? 'Page image' }}">
                            @else
                                <div class="placeholder">No image</div>
                            @endif
                        </td>
                        <td>{{ $page['page_title'] ?? 'Untitled' }}</td>
                        <td>{{ $page['image_alt_text'] ?? '-' }}</td>
                        <td><span class="type">{{ $page['type'] ?? 'Post' }}</span></td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-info" href="{{ route('admin.pages.preview', ['id' => $page['id']]) }}">Preview</a>
                                <a class="btn btn-warn" href="{{ route('admin.pages.edit', ['id' => $page['id']]) }}">Update</a>
                                <form class="inline" action="{{ route('admin.pages.delete', ['id' => $page['id']]) }}" method="POST" onsubmit="return confirm('Delete this page?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">No pages posted yet.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
