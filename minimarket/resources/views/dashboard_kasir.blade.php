<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Kasir</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/dashboard_kasir">
                My Kasir
            </a>

            <span class="text-white">
                Kasir
            </span>
        </div>
    </nav>


    <!-- Content -->
    <div class="container py-4">

        <div class="mb-4">
            <h2 class="fw-bold">Kasir</h2>
            <p class="text-muted">
                Selamat datang di halaman Kasir.
            </p>
        </div>


        <!-- Cards -->
        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">
                            Total User
                        </h6>

                        <h2 class="fw-bold">
                            25
                        </h2>

                        <p class="text-muted mb-0">
                            Pengguna terdaftar
                        </p>
                    </div>
                </div>
            </div>


            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">
                            Total Produk
                        </h6>

                        <h2 class="fw-bold">
                            120
                        </h2>

                        <p class="text-muted mb-0">
                            Produk tersedia
                        </p>
                    </div>
                </div>
            </div>


            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">
                            Transaksi
                        </h6>

                        <h2 class="fw-bold">
                            85
                        </h2>

                        <p class="text-muted mb-0">
                            Transaksi bulan ini
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <!-- Table -->
        <div class="card border-0 shadow-sm mt-4">

            <div class="card-body">

                <h5 class="fw-bold mb-3">
                    Data Terbaru
                </h5>

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>SKU</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Beras</td>
                                <td>BRS001</td>
                                <td>
                                    <span class="badge bg-success">
                                        Tersedia
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Minyak</td>
                                <td>MYK001</td>
                                <td>
                                    <span class="badge bg-success">
                                        Tersedia
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Gula</td>
                                <td>GLA001</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        habis
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>
</html>