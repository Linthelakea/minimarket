<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal Kasir - Minimarket POS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #059669;
            --primary-dark: #047857;
            --primary-light: #ecfdf5;
            --secondary: #0284c7;
            --surface: #ffffff;
            --bg-main: #f1f5f9;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --radius-lg: 16px;
            --radius-md: 10px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-md: 0 6px 16px rgba(0,0,0,0.06);
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

        /* Top Navbar */
        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: var(--shadow-sm);
        }

        .brand-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            box-shadow: 0 4px 10px rgba(5, 150, 105, 0.25);
        }

        .brand-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .brand-status {
            font-size: 0.75rem;
            color: #059669;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: #10b981;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.3);
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .cashier-badge {
            background: var(--primary-light);
            border: 1px solid rgba(5, 150, 105, 0.2);
            padding: 5px 12px;
            border-radius: 9999px;
            font-size: 0.8rem;
            color: var(--primary-dark);
            font-weight: 700;
        }

        .btn-logout {
            background: #fff1f2;
            color: #e11d48;
            border: 1px solid #fecdd3;
            padding: 7px 14px;
            border-radius: var(--radius-md);
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover {
            background: #ffe4e6;
        }

        /* Workspace Grid */
        .workspace {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 20px;
            padding: 24px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            flex: 1;
        }

        @media (max-width: 960px) {
            .workspace {
                grid-template-columns: 1fr;
            }
        }

        /* Left Column: Product Selection */
        .products-panel {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .panel-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .search-field {
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            width: 280px;
            outline: none;
            transition: all 0.2s;
        }

        .search-field:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 14px;
            overflow-y: auto;
            max-height: calc(100vh - 220px);
            padding-right: 4px;
        }

        .product-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 14px;
            cursor: pointer;
            transition: all 0.18s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            user-select: none;
        }

        .product-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .product-card:active {
            transform: scale(0.98);
        }

        .prod-sku {
            font-size: 0.7rem;
            font-family: monospace;
            color: var(--text-muted);
            background: #f8fafc;
            padding: 2px 6px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 6px;
        }

        .prod-name {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .prod-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 8px;
        }

        .prod-price {
            font-size: 0.95rem;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .prod-stock {
            font-size: 0.72rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Right Column: Cart & Checkout */
        .cart-panel {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: fit-content;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            padding-bottom: 12px;
            margin-bottom: 16px;
        }

        .cart-title {
            font-size: 1.15rem;
            font-weight: 800;
        }

        .btn-clear {
            background: none;
            border: none;
            color: #ef4444;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-clear:hover {
            text-decoration: underline;
        }

        .cart-items {
            max-height: 280px;
            overflow-y: auto;
            margin-bottom: 16px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            gap: 10px;
        }

        .item-details {
            flex: 1;
        }

        .item-title {
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .item-sub {
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        .item-qty-controls {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-qty {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: #f8fafc;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-qty:hover {
            background: #e2e8f0;
        }

        .qty-val {
            font-size: 0.85rem;
            font-weight: 700;
            min-width: 18px;
            text-align: center;
        }

        .item-total {
            font-size: 0.9rem;
            font-weight: 800;
            color: var(--text-dark);
            min-width: 75px;
            text-align: right;
        }

        .empty-cart-msg {
            text-align: center;
            color: var(--text-muted);
            padding: 30px 10px;
            font-size: 0.85rem;
        }

        /* Summary & Payment */
        .checkout-box {
            border-top: 2px dashed var(--border);
            padding-top: 16px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .total-highlight {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .pay-input-group {
            margin: 14px 0;
        }

        .pay-input-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .pay-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-weight: 700;
            outline: none;
            transition: all 0.2s;
        }

        .pay-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15);
        }

        .change-box {
            background: #f8fafc;
            border-radius: var(--radius-md);
            padding: 10px 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            font-size: 0.9rem;
        }

        .change-val {
            font-weight: 800;
            color: #0369a1;
        }

        .btn-checkout {
            width: 100%;
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            border: none;
            padding: 14px;
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
            transition: all 0.2s ease;
        }

        .btn-checkout:hover {
            filter: brightness(1.05);
            transform: translateY(-1px);
        }

        .btn-checkout:disabled {
            background: #cbd5e1;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }

        /* Struk Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 100;
        }

        .struk-card {
            background: white;
            width: 320px;
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            text-align: center;
            font-family: monospace;
        }

        .struk-header h3 {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 4px;
            font-family: sans-serif;
        }

        .struk-divider {
            border-top: 1px dashed #cbd5e1;
            margin: 12px 0;
        }

        .btn-close-modal {
            margin-top: 16px;
            background: var(--text-dark);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: var(--radius-md);
            cursor: pointer;
            width: 100%;
            font-weight: 700;
            font-family: sans-serif;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="brand-box">
            <div class="brand-icon">K</div>
            <div>
                <div class="brand-title">Terminal Kasir POS</div>
                <div class="brand-status">
                    <span class="status-dot"></span> Terminal Siap Melayani Transaksi
                </div>
            </div>
        </div>

        <div class="user-actions">
            <div class="cashier-badge">
                Kasir: <strong>{{ Auth::user()->name ?? 'Kasir Shift 1' }}</strong>
            </div>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Kasir Workspace -->
    <div class="workspace">

        <!-- Left: Product Selection -->
        <div class="products-panel">
            <div class="panel-header">
                <div>
                    <h2 class="panel-title">Katalog Produk</h2>
                    <span style="font-size: 0.8rem; color: var(--text-muted);">Klik item untuk menambahkan ke transaksi</span>
                </div>
                <div>
                    <input type="text" id="kasirSearch" class="search-field" placeholder="Cari nama atau SKU..." onkeyup="filterKasirProducts()">
                </div>
            </div>

            <div class="products-grid" id="productGrid">
                @forelse($products as $prod)
                <div class="product-card" onclick="addToCart({{ $prod->id }}, '{{ addslashes($prod->name) }}', {{ $prod->price }}, {{ $prod->stock }})">
                    <div>
                        <span class="prod-sku">{{ $prod->sku ?? 'SKU-00' . $prod->id }}</span>
                        <div class="prod-name">{{ $prod->name }}</div>
                    </div>
                    <div class="prod-footer">
                        <span class="prod-price">Rp {{ number_format($prod->price, 0, ',', '.') }}</span>
                        <span class="prod-stock">Stok: {{ $prod->stock }}</span>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1 / -1; text-align: center; color: var(--text-muted); padding: 40px;">
                    Belum ada produk yang dapat dijual.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Right: Cart & Calculation -->
        <div class="cart-panel">
            <div class="cart-header">
                <h2 class="cart-title">Struk Transaksi</h2>
                <button type="button" class="btn-clear" onclick="clearCart()">Kosongkan</button>
            </div>

            <div class="cart-items" id="cartContainer">
                <div class="empty-cart-msg" id="emptyCartMsg">
                    Keranjang kosong.<br>Pilih produk di samping untuk memulai.
                </div>
            </div>

            <div class="checkout-box">
                <div class="summary-row">
                    <span style="font-weight: 600; color: var(--text-muted);">Total Belanja</span>
                    <span class="total-highlight" id="totalDisplay">Rp 0</span>
                </div>

                <div class="pay-input-group">
                    <label for="cashInput">Uang Diterima (Rp)</label>
                    <input type="number" id="cashInput" class="pay-input" placeholder="0" oninput="calculateChange()">
                </div>

                <div class="change-box">
                    <span>Kembalian</span>
                    <span class="change-val" id="changeDisplay">Rp 0</span>
                </div>

                <button type="button" id="btnPay" class="btn-checkout" onclick="finishTransaction()" disabled>
                    Selesaikan Transaksi & Cetak
                </button>
            </div>
        </div>

    </div>

    <!-- Modal Struk -->
    <div class="modal-overlay" id="receiptModal">
        <div class="struk-card">
            <div class="struk-header">
                <h3>MINIMARKET POS</h3>
                <p style="font-size: 0.75rem; color: #64748b;">Jl. Toko Kelontong Mandiri</p>
                <p style="font-size: 0.7rem; color: #64748b;" id="receiptDate"></p>
            </div>
            <div class="struk-divider"></div>
            <div id="receiptItems" style="text-align: left; font-size: 0.8rem; line-height: 1.4;"></div>
            <div class="struk-divider"></div>
            <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 0.9rem;">
                <span>TOTAL:</span>
                <span id="receiptTotal"></span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 0.8rem; margin-top: 4px;">
                <span>BAYAR:</span>
                <span id="receiptPay"></span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 0.8rem;">
                <span>KEMBALI:</span>
                <span id="receiptChange"></span>
            </div>
            <div class="struk-divider"></div>
            <p style="font-size: 0.75rem; color: #64748b;">Terima kasih atas kunjungan Anda!</p>
            <button type="button" class="btn-close-modal" onclick="closeReceipt()">Tutup & Transaksi Baru</button>
        </div>
    </div>

    <!-- Script Logika Kasir Instan -->
    <script>
        let cart = [];

        function formatRupiah(number) {
            return 'Rp ' + Number(number).toLocaleString('id-ID');
        }

        function addToCart(id, name, price, stock) {
            const existing = cart.find(item => item.id === id);
            if (existing) {
                if (existing.qty < stock) {
                    existing.qty += 1;
                } else {
                    alert('Stok produk telah mencapai batas maksimal.');
                    return;
                }
            } else {
                cart.push({ id, name, price, qty: 1, stock });
            }
            renderCart();
        }

        function changeQty(id, delta) {
            const item = cart.find(i => i.id === id);
            if (!item) return;

            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(i => i.id !== id);
            }
            renderCart();
        }

        function clearCart() {
            cart = [];
            document.getElementById('cashInput').value = '';
            renderCart();
        }

        function getTotal() {
            return cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        }

        function renderCart() {
            const container = document.getElementById('cartContainer');
            const totalDisplay = document.getElementById('totalDisplay');
            const total = getTotal();

            if (cart.length === 0) {
                container.innerHTML = `<div class="empty-cart-msg" id="emptyCartMsg">Keranjang kosong.<br>Pilih produk di samping untuk memulai.</div>`;
                totalDisplay.innerText = 'Rp 0';
                calculateChange();
                return;
            }

            let html = '';
            cart.forEach(item => {
                html += `
                <div class="cart-item">
                    <div class="item-details">
                        <div class="item-title">${item.name}</div>
                        <div class="item-sub">${formatRupiah(item.price)} x ${item.qty}</div>
                    </div>
                    <div class="item-qty-controls">
                        <button type="button" class="btn-qty" onclick="changeQty(${item.id}, -1)">-</button>
                        <span class="qty-val">${item.qty}</span>
                        <button type="button" class="btn-qty" onclick="changeQty(${item.id}, 1)">+</button>
                    </div>
                    <div class="item-total">${formatRupiah(item.price * item.qty)}</div>
                </div>
                `;
            });

            container.innerHTML = html;
            totalDisplay.innerText = formatRupiah(total);
            calculateChange();
        }

        function calculateChange() {
            const total = getTotal();
            const cash = parseFloat(document.getElementById('cashInput').value) || 0;
            const changeDisplay = document.getElementById('changeDisplay');
            const btnPay = document.getElementById('btnPay');

            const change = cash - total;

            if (total > 0 && cash >= total) {
                changeDisplay.innerText = formatRupiah(change);
                changeDisplay.style.color = '#059669';
                btnPay.disabled = false;
            } else {
                changeDisplay.innerText = cash > 0 ? 'Kurang ' + formatRupiah(Math.abs(change)) : 'Rp 0';
                changeDisplay.style.color = cash > 0 && change < 0 ? '#ef4444' : '#64748b';
                btnPay.disabled = true;
            }
        }

        function finishTransaction() {
            const total = getTotal();
            const cash = parseFloat(document.getElementById('cashInput').value) || 0;
            const change = cash - total;

            let itemsText = '';
            cart.forEach(item => {
                itemsText += `<div style="display:flex; justify-content:space-between;"><span>${item.name} x${item.qty}</span><span>${formatRupiah(item.price * item.qty)}</span></div>`;
            });

            document.getElementById('receiptDate').innerText = new Date().toLocaleString('id-ID');
            document.getElementById('receiptItems').innerHTML = itemsText;
            document.getElementById('receiptTotal').innerText = formatRupiah(total);
            document.getElementById('receiptPay').innerText = formatRupiah(cash);
            document.getElementById('receiptChange').innerText = formatRupiah(change);

            document.getElementById('receiptModal').style.display = 'flex';
        }

        function closeReceipt() {
            document.getElementById('receiptModal').style.display = 'none';
            clearCart();
        }

        function filterKasirProducts() {
            const query = document.getElementById('kasirSearch').value.toLowerCase();
            const cards = document.querySelectorAll('#productGrid .product-card');

            cards.forEach(card => {
                const text = card.innerText.toLowerCase();
                card.style.display = text.includes(query) ? '' : 'none';
            });
        }
    </script>
</body>
</html>
