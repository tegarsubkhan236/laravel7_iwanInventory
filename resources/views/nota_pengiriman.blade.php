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
                Nota Pengiriman
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>#PNGRMN{{ $pengiriman->id }}</strong></th>
                    <th>{{ $pengiriman->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Perusahaan: </h4>
                        <p>Zain Parfum<br>
                            Jl. Wanaraja No. 36 Wanaraja Kab. Garut<br>
                            Telp. (+62) 82213052170<br>
                            email : zainparfum36@gmail.com
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Mitra Toko: </h4>
                        <p>{{ $pengiriman->pelanggan->nama }}<br>
                        {{ $pengiriman->pelanggan->alamat }}<br>
                        {{ $pengiriman->pelanggan->no_telp }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Bibit Parfum</th>
                    <th>Harga</th>
                    <th colspan="2">Qty</th>
                </tr>
                <tr>
                    <td>{{ $pengiriman->barang->nama_parfum }}</td>
                    <td>Rp. {{ format_uang($pengiriman->barang->harga_reseller) }}</td>
                    <td colspan="2">{{ $pengiriman->jumlah }}ml</td>
                </tr>
                <tr>
                    <th colspan="3">Subtotal</th>
                    <td>Rp {{ format_uang($sub_bibit = $pengiriman->jumlah*$pengiriman->barang->harga_reseller) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp {{ format_uang($sub_bibit) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>