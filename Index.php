<?php

require_once 'Mahasiswa.php';
require_once 'Produk.php';

// 1. Buat 3 object Mahasiswa 
$mahasiswa1 = new Mahasiswa("24.24.032095", "Okta Ramadhani", "Pendidikan Teknologi Informasi", 3.85);
$mahasiswa2 = new Mahasiswa("24.24.032569", "Novy Astoty", "Pendidikan Teknologi Informasi", 3.40);
$mahasiswa3 = new Mahasiswa("24.24.032255", "Rahmansyah", "Pendidikan Teknologi Informasi", 3.95);

$listMahasiswa = [$mahasiswa1, $mahasiswa2, $mahasiswa3];

// 2. Buat 20 object Produk menggunakan loop
$listProduk = [];
for ($i = 1; $i <= 20; $i++) {
    $harga = rand(10, 100) * 1000; // Harga acak antara 10.000 - 100.000
    $stok = rand(5, 50);           // Stok acak antara 5 - 50
    $listProduk[] = new Produk("Produk " . $i, $harga, $stok);
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Praktikum PBO</title>
    <style>
        :root {
            --primary-orange: #f97316;
            --secondary-orange: #fdba74;
            --light-orange: #fff7ed;
            --dark-orange: #c2410c;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-orange);
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            background-color: var(--primary-orange);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: var(--dark-orange);
            border-bottom: 2px solid var(--secondary-orange);
            padding-bottom: 10px;
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #fed7aa;
        }
        th {
            background-color: var(--primary-orange);
            color: white;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) {
            background-color: #ffedd5;
        }
        tr:hover {
            background-color: #fed7aa;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
            color: white;
        }
        .bg-cumlaude { background-color: #10b981; }
        .bg-sangat-memuaskan { background-color: #3b82f6; }
        .bg-memuaskan { background-color: #f59e0b; }
        .bg-cukup { background-color: #6b7280; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Dashboard Praktikum Pertemuan 2</h1>
    </div>

    <div class="container">
        <!-- Tabel Data Mahasiswa -->
        <h2>Data Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Informasi Mahasiswa</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listMahasiswa as $index => $mhs): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $mhs->info() ?></td>
                        <td>
                            <?php 
                                $predikat = $mhs->predikat();
                                $badgeClass = 'bg-cukup';
                                if ($predikat === 'Cumlaude') $badgeClass = 'bg-cumlaude';
                                elseif ($predikat === 'Sangat Memuaskan') $badgeClass = 'bg-sangat-memuaskan';
                                elseif ($predikat === 'Memuaskan') $badgeClass = 'bg-memuaskan';
                            ?>
                            <span class="badge <?= $badgeClass ?>"><?= $predikat ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tabel Data Produk -->
        <h2>Daftar Produk (Total: <?= count($listProduk) ?>)</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga (Rp)</th>
                    <th>Stok</th>
                    <th>Total Nilai (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProduk as $index => $produk): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $produk->nama ?></td>
                        <td><?= number_format($produk->harga, 0, ',', '.') ?></td>
                        <td><?= $produk->stok ?></td>
                        <td><?= number_format($produk->totalNilai(), 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
