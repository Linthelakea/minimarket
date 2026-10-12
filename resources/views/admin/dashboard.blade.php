<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Minimarket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #eef2ff;
            --secondary: #0ea5e9;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --bg-main: #f8fafc;
            --surface: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --radius-lg: 16px;
            --radius-md: 12px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.05);
            --shadow-lg: 0 10px 25px -5px rgba(79, 70, 229, 0.12);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navigation */
        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: var(--shadow-sm);
        }

        .brand-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            font-weight: 800;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
        }

        .brand-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.02em;
        }

        .brand-subtitle {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--primary-light);
            padding: 6px 14px 6px 8px;
            border-radius: 9999px;
            border: 1px solid rgba(79, 70, 229, 0.15);
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .badge-role {
            font-size: 0.65rem;
            text-transform: uppercase;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 0.05em;
        }

        .btn-logout {
            background: #fff1f2;
            color: #e11d48;
            border: 1px solid #fecdd3;
            padding: 8px 16px;
            border-radius: var(--radius-md);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover {
            background: #ffe4e6;
            color: #be123c;
            transform: translateY(-1px);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 24px;
            width: 100%;
            flex: 1;
        }

        .page-header {
            margin-bottom: 28px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-header h1 {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.02em;
        }

        .page-header p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-top: 4px;
        }

        .quick-links {
            display: flex;
            gap: 10px;
        }

        .btn-outline {
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 8px 14px;
            border-radius: var(--radius-md);
            color: var(--text-dark);
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-1px);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--surface);
            padding: 22px;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary);
        }

        .stat-card.card-green::before { background: var(--success); }
        .stat-card.card-blue::before { background: var(--secondary); }
        .stat-card.card-amber::before { background: var(--warning); }

        .stat-label {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin: 8px 0;
            letter-spacing: -0.03em;
        }

        .stat-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: var(--success);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        /* Content Card */
        .content-card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 32px;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .search-box {
            padding: 8px 14px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.85rem;
            width: 260px;
            outline: none;
            transition: border-color 0.2s;
        }

        .search-box:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* Modern Table */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: #f8fafc;
            padding: 12px 24px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 14px 24px;
            font-size: 0.9rem;
            color: var(--text-dark);
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #fbfcfe;
        }

        .sku-code {
            font-family: monospace;
            background: #f1f5f9;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.8rem;
            color: #334155;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .badge-success {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-warning {
            background: #fef3c7;
            color: #b45309;
        }

        footer {
            text-align: center;
            padding: 24px;
            font-size: 0.8rem;
            color: var(--text-muted);
            border-top: 1px solid var(--border);
            background: var(--surface);
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="brand-container">
            <div class="brand-icon">M</div>
            <div>
                <div class="brand-title">Minimarket POS</div>
                <div class="brand-subtitle">Panel Administrator</div>
            </div>
        </div>

        <div class="nav-actions">
            <div class="user-pill">
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="badge-role">{{ Auth::user()->role ?? 'Admin' }}</div>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Container -->
    <main class="container">

        <!-- Page Header -->
        <header class="page-header">
            <div>
                <h1>Ringkasan Toko & Admin</h1>
                <p>Kelola data katalog produk, staff toko, dan pantau operasional minimarket.</p>
            </div>
            <div class="quick-links">
                <a href="{{ url('/produk') }}" class="btn-outline">Katalog Produk</a>
                <a href="{{ url('/laporan') }}" class="btn-outline">Laporan Penjualan</a>
                <a href="{{ url('/kasir/dashboard') }}" class="btn-outline">Lihat Terminal Kasir</a>
            </div>
        </header>

        <!-- Stats Overview Cards -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">{{ $totalProducts ?? ($products->count() ?? 0) }}</div>
                <div class="stat-desc">Item terdaftar dalam database</div>
            </div>

            <div class="stat-card card-blue">
                <div class="stat-label">Total Staff / User</div>
                <div class="stat-value">{{ $totalUsers ?? 2 }}</div>
                <div class="stat-desc">Akun admin & kasir aktif</div>
            </div>

            <div class="stat-card card-green">
                <div class="stat-label">Status Toko</div>
                <div class="stat-value" style="font-size: 1.5rem; color: var(--success); display: flex; align-items: center; gap: 8px;">
                    <span class="status-dot"></span> Buka Normal
                </div>
                <div class="stat-desc">Sistem POS online & tersinkron</div>
            </div>

            <div class="stat-card card-amber">
                <div class="stat-label">Akses Role</div>
                <div class="stat-value" style="font-size: 1.5rem; color: #b45309;">
                    {{ strtoupper(Auth::user()->role ?? 'ADMIN') }}
                </div>
                <div class="stat-desc">Hak akses penuh ke semua modul</div>
            </div>
        </section>

        <!-- Product Table -->
        <section class="content-card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Daftar Stok Produk</h2>
                </div>
                <div>
                    <input type="text" id="searchInput" class="search-box" placeholder="Cari nama atau SKU produk..." onkeyup="filterProducts()">
                </div>
            </div>

            <div class="table-wrapper">
                <table id="productTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode SKU</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="sku-code">{{ $item->sku ?? 'PRD-0' . ($index + 1) }}</span></td>
                            <td style="font-weight: 600;">{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td><strong>{{ $item->stock }}</strong> unit</td>
                            <td>
                                @if(($item->stock ?? 0) > 10)
                                    <span class="badge badge-success">Tersedia</span>
                                @else
                                    <span class="badge badge-warning">Stok Rendah</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">
                                Belum ada data produk di database.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <footer>
        &copy; 2026 Minimarket - Sistem Point of Sale & Workshop Pemrograman Web
    </footer>

    <script>
        function filterProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('#productTable tbody tr');

            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        }
    </script>
</body>
</html>
