<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>
                Nota Penjualan Parfum
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>#TR{{ $penjualan->id }}</strong></th>
                    <th>{{ $penjualan->created_at->format('D, d M Y') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Bibit Parfum</th>
                    <th>Harga</th>
                    <th colspan="2">Qty</th>
                </tr>
                <tr>
                    <td>{{ $penjualan->barang->nama_parfum }}</td>
                    <td>Rp. {{ format_uang($penjualan->barang->harga_penjualan) }}</td>
                    <td colspan="2">{{ $penjualan->jumlah }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp {{ format_uang($penjualan->total_penjualan) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>