<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Penjualan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
        }

        .dashboard {
            padding: 20px;
        }

        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 25px;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .stat-title {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #212529;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: #e9f2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .report-box {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body>

    <div class="container-fluid dashboard">

        <!-- Header -->
        <div class="mb-4">
            <h2 class="fw-bold">Laporan Penjualan</h2>
            <p class="text-muted">
                Rekap statistik penjualan sederhana
            </p>
        </div>

        <!-- Statistik -->
        <div class="row g-4">

            <!-- Total Transaksi -->
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="stat-title">
                                Total Transaksi
                            </div>

                            <div class="stat-value">
                                {{ $laporan['total_transaksi'] }}
                            </div>
                        </div>

                        <div class="icon-box">
                            🛒
                        </div>

                    </div>
                </div>
            </div>

            <!-- Total Produk -->
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="stat-title">
                                Produk Terjual
                            </div>

                            <div class="stat-value">
                                {{ $laporan['total_produk'] }}
                            </div>
                        </div>

                        <div class="icon-box">
                            📦
                        </div>

                    </div>
                </div>
            </div>

            <!-- Pendapatan -->
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="stat-title">
                                Total Pendapatan
                            </div>

                            <div class="stat-value">
                                Rp {{ number_format($laporan['total_pendapatan'], 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="icon-box">
                            💰
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Ringkasan -->
        <div class="report-box">

            <h5 class="fw-bold mb-3">
                Ringkasan Penjualan
            </h5>

            <p class="text-muted mb-0">
                Berdasarkan data saat ini terdapat
                <strong>{{ $laporan['total_transaksi'] }}</strong>
                transaksi dengan total
                <strong>{{ $laporan['total_produk'] }}</strong>
                produk terjual.
                Total pendapatan mencapai
                <strong>
                    Rp {{ number_format($laporan['total_pendapatan'], 0, ',', '.') }}
                </strong>.
            </p>

        </div>

    </div>

</body>

</html>