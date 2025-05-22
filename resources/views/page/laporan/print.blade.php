<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Masuk & Keluar</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 1.5cm;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }

        h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }

        h3 {
            margin: 5px 0 0;
            font-size: 16px;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: 600;
            padding: 10px;
            border: 1px solid #ddd;
        }

        td {
            padding: 8px 10px;
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            position: fixed;
            bottom: 0;
            right: 0;
            width: 100%;
            text-align: right;
            font-size: 13px;
            color: #555;
            border-top: 1px solid #ddd;
            padding: 10px 0;
            background-color: white;
            margin-right: 1.5cm;
            padding-right: 1.5cm;
        }

        .text-center {
            text-align: center;
        }

        @media print {
            body {
                margin: 1cm;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>LAPORAN PENGELOLAAN</h2>
        <h3>BARANG MASUK & KELUAR</h3>
    </div>

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
                    <td class="text-center">{{ $item['stok_awal'] }}</td>
                    <td class="text-center">{{ $item['barang_masuk'] }}</td>
                    <td class="text-center">{{ $item['barang_keluar'] }}</td>
                    <td class="text-center">{{ $item['stok_akhir'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</body>

</html>
