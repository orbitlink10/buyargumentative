<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Writing Script</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #f25c3c;
            --accent-soft: #ffe7df;
            --dark: #1c1c28;
            --muted: #6b6b7a;
            --card: #ffffff;
            --border: #ececf3;
            --bg: linear-gradient(180deg, #fff6f2 0%, #f8f9fb 100%);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Manrope', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
        }
        a { color: inherit; text-decoration: none; }
        .layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }
        .sidebar {
            background: #fff;
            border-right: 1px solid var(--border);
            padding: 24px 22px;
            display: flex;
            flex-direction: column;
            gap: 28px;
            box-shadow: 8px 0 30px rgba(0,0,0,0.04);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            font-size: 22px;
        }
        .brand .mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: var(--accent);
            color: #fff;
            display: grid;
            place-items: center;
            font-size: 20px;
            box-shadow: 0 14px 28px rgba(242,92,60,0.35);
        }
        .badge-label {
            background: var(--accent-soft);
            padding: 12px 14px;
            border-radius: 14px;
            font-weight: 700;
            color: var(--accent);
        }
        .nav-group { display: grid; gap: 10px; }
        .nav-title { font-size: 12px; font-weight: 700; color: var(--muted); letter-spacing: 0.4px; text-transform: uppercase; }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 700;
            color: #2d2d35;
            transition: background .12s ease, color .12s ease;
        }
        .nav-link.active,
        .nav-link:hover { background: #fff2ec; color: var(--accent); }
        .nav-count {
            margin-left: auto;
            background: #f3f4f8;
            border-radius: 10px;
            padding: 4px 9px;
            font-size: 12px;
            font-weight: 800;
            color: #3a3a45;
        }
        .content {
            padding: 28px 32px 48px;
            display: grid;
            gap: 24px;
            background: var(--bg);
        }
        .topbar {
            display: flex;
            align-items: center;
            gap: 16px;
            justify-content: space-between;
        }
        .topbar .actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .btn {
            border: 1px solid transparent;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 800;
            cursor: pointer;
            background: #fff;
            color: #2b2b34;
            transition: transform .12s ease, box-shadow .12s ease, border .12s ease;
        }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 12px 24px rgba(0,0,0,0.06); }
        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 14px 30px rgba(242,92,60,0.35);
        }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
        }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 18px 18px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.04);
            display: grid;
            gap: 8px;
        }
        .card .label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            color: #2c2c36;
        }
        .card .count { font-size: 24px; font-weight: 800; }
        .card small { color: var(--muted); }
        .card .trend {
            margin-left: auto;
            color: var(--accent);
            font-size: 13px;
            font-weight: 800;
        }
        .chart-placeholder {
            background: linear-gradient(120deg, rgba(242,92,60,0.12), rgba(255,255,255,0.9));
            border-radius: 20px;
            border: 1px dashed rgba(242,92,60,0.35);
            height: 240px;
            display: grid;
            place-items: center;
            color: var(--muted);
            font-weight: 700;
        }
        .table-card {
            padding: 0;
            overflow: hidden;
        }
        .editor-card {
            gap: 14px;
        }
        .editor-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
        }
        .editor-title {
            font-size: 20px;
            font-weight: 800;
        }
        .editor-subtitle {
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }
        .editor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
        }
        .field {
            display: grid;
            gap: 6px;
        }
        .field.full {
            grid-column: 1 / -1;
        }
        .field label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: var(--muted);
            font-weight: 800;
        }
        .field input,
        .field textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 11px 12px;
            font: inherit;
            font-size: 14px;
            color: var(--dark);
            background: #fff;
        }
        .field textarea {
            min-height: 96px;
            resize: vertical;
        }
        .alert {
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 14px;
        }
        .alert.success {
            background: #e8f8ee;
            color: #1a9b52;
            border: 1px solid #c8e9d3;
        }
        .alert.error {
            background: #fff0f0;
            color: #bf2323;
            border: 1px solid #ffd5d5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead { background: #fff7f3; }
        th, td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            font-size: 14px;
        }
        th { font-weight: 800; color: #3a3a45; }
        tbody tr:hover { background: #fdf8f6; }
        .status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 13px;
        }
        .status.pending { background: #fff4e5; color: #d66b00; }
        .status.assigned { background: #e8f5ff; color: #0c7bca; }
        .status.completed { background: #e9f8ee; color: #1a9b52; }
        .status.revision { background: #fff0f2; color: #d62d50; }
        .avatar {
            width: 34px; height: 34px; border-radius: 50%;
            background: #f2f4f8;
            display: grid; place-items: center;
            font-weight: 800; color: #4a4a55;
        }
        @media (max-width: 1100px) {
            .layout { grid-template-columns: 1fr; }
            .sidebar { flex-direction: row; flex-wrap: wrap; align-items: center; }
            .nav-group { grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); width: 100%; }
            .content { padding: 24px 20px 40px; }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <div class="mark">✦</div>
            <span>Admin</span>
        </div>
        <div class="badge-label">SMS - 1</div>

        <div class="nav-group">
            <div class="nav-title">Main</div>
            <a class="nav-link active" href="{{ route('admin.dashboard') }}"><span>Dashboard</span></a>
            <a class="nav-link" href="{{ route('order.create') }}"><span>Add Order</span></a>
            <a class="nav-link" href="{{ route('admin.orders') }}"><span>Orders</span><span class="nav-count">20</span></a>
            <a class="nav-link" href="{{ route('admin.courses') }}"><span>Courses</span><span class="nav-count">6</span></a>
        </div>

        <div class="nav-group">
            <div class="nav-title">Manage Users</div>
            <a class="nav-link" href="{{ route('admin.clients') }}"><span>Clients</span><span class="nav-count">9</span></a>
            <a class="nav-link" href="{{ route('admin.writers') }}"><span>Writers</span><span class="nav-count">3</span></a>
            <a class="nav-link" href="{{ route('admin.orders') }}"><span>Financial</span></a>
        </div>

        <div class="nav-group">
            <div class="nav-title">Configs</div>
            <a class="nav-link" href="{{ route('admin.orders') }}"><span>Mass Email</span></a>
            <a class="nav-link" href="{{ route('admin.settings') }}"><span>Settings</span></a>
            <a class="nav-link" href="{{ route('admin.pages') }}"><span>Pages</span></a>
            <a class="nav-link" href="{{ route('admin.orders') }}"><span>Configs</span></a>
        </div>
    </aside>

    <main class="content">
        @php
            $orders = $orders ?? session('orders', []);
            $homeContent = $homeContent ?? [];
            $count = function($status) use ($orders) { return collect($orders)->where('status', $status)->count(); };
        @endphp
        <div class="topbar">
            <div>
                <div style="font-size:14px; color:var(--muted); font-weight:700;">Welcome back</div>
                <div style="font-size:24px; font-weight:800;">Francis Kamau</div>
            </div>
            <div class="actions">
                <a class="btn" href="{{ route('admin.orders') }}">Invoices</a>
                <a class="btn btn-primary" href="{{ route('order.create') }}">New Order</a>
            </div>
        </div>

        @if(session('homepage_saved'))
            <div class="alert success">{{ session('homepage_saved') }}</div>
        @endif
        @if($errors->any())
            <div class="alert error">{{ $errors->first() }}</div>
        @endif

        <section class="card editor-card">
            <div class="editor-head">
                <div>
                    <div class="editor-title">Homepage Content</div>
                    <div class="editor-subtitle">Edit the homepage hero text, ratings, and highlight cards.</div>
                </div>
                <button form="homepageContentForm" type="submit" class="btn btn-primary">Save Homepage</button>
            </div>

            <form id="homepageContentForm" action="{{ route('admin.homepage.update') }}" method="POST" class="editor-grid">
                @csrf
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
            </form>
        </section>

        <section class="summary-grid">
            @php $statuses = [
                ['key'=>'pending','icon'=>'📑','label'=>'Pending','sub'=>'Awaiting writer'],
                ['key'=>'available','icon'=>'🎧','label'=>'Available','sub'=>'Open to claim'],
                ['key'=>'assigned','icon'=>'💼','label'=>'Assigned','sub'=>'In progress'],
                ['key'=>'editing','icon'=>'🖥','label'=>'Editing','sub'=>'QA review'],
                ['key'=>'completed','icon'=>'🏁','label'=>'Completed','sub'=>'Delivered'],
                ['key'=>'revision','icon'=>'📅','label'=>'Revision','sub'=>'Awaiting fixes'],
                ['key'=>'approved','icon'=>'📢','label'=>'Approved','sub'=>'Paid'],
                ['key'=>'cancelled','icon'=>'↩','label'=>'Cancelled','sub'=>'Refunded'],
            ]; @endphp
            @foreach($statuses as $s)
                <a class="card" href="{{ route('admin.orders', ['status' => $s['key']]) }}" style="text-decoration:none; color:inherit; cursor:pointer;">
                    <div class="label"><span>{{ $s['icon'] }}</span> {{ $s['label'] }}</div>
                    <div class="count">{{ $count($s['key']) }} orders</div>
                    <div style="display:flex; align-items:center; gap:10px;"><small>{{ $s['sub'] }}</small><span class="trend">↗</span></div>
                </a>
            @endforeach
        </section>

        <div class="card chart-placeholder">
            Performance chart placeholder (connect to your analytics or reporting data)
        </div>

        <div class="card table-card">
            <table>
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Client</th>
                    <th>Writer</th>
                    <th>Topic</th>
                    <th>Due</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order['id'] }}</td>
                        <td><span class="avatar">{{ strtoupper(substr($order['title'] ?? 'O',0,1)) }}</span> {{ $order['customer_name'] ?? 'Customer' }}</td>
                        <td>{{ $order['writer_name'] ?? 'Unassigned' }}</td>
                        <td>{{ $order['title'] ?? 'Untitled' }}</td>
                        <td>{{ $order['deadline'] ?? '48 Hours' }}</td>
                        <td><span class="status {{ $order['status'] ?? 'pending' }}">{{ ucfirst($order['status'] ?? 'pending') }}</span></td>
                    </tr>
                @empty
                    <tr><td colspan="6" style="text-align:center; padding:16px; color:#6b6b7a;">No orders yet</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
