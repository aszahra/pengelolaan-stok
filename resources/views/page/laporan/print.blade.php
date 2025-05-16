<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Masuk & Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        tfoot {
            margin-top: 30px;
            font-size: 14px;
            text-align: right;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>

<body>

    <h2>Laporan Pengelolaan Barang Masuk & Keluar</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok Awal</th>
                <th>Barang Masuk</th>
                <th>Barang Keluar</th>
                <th>Stok Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $item)
                <tr>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>{{ $item['stok_awal'] }}</td>
                    <td>{{ $item['barang_masuk'] }}</td>
                    <td>{{ $item['barang_keluar'] }}</td>
                    <td>{{ $item['stok_akhir'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>

</body>

</html>
<script>
    window.onload = function() {
        window.print();
    }
</script>
