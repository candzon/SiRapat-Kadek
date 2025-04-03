<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @page {
            size: A4;
        }

        .container {
            margin: 10px auto;
            width: 100%;
        }

        .header {
            text-align: start;
        }

        .header img {
            width: 200px;
            float: left;
        }

        .header h3,
        .header p {
            margin: 2px;
            word-wrap: break-word;
        }

        .divider {
            border: 1px solid #000;
            margin: 20px 0;
            width: 100%;
        }

        .isi-body {
            margin: 10px;
        }

        .isi-header {
            text-align: center;
        }

        .underline-text {
            text-decoration: underline;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .td-quantity {
            text-align: center;
        }

        .td-background {
            border: 1px solid #000;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>SISTEM INFORMASI RAPAT</h3>
            <p>Jl. Badak Agung No. 17, Denpasar Barat, Bali</p>
            <p>Telepon : 08123456789 | E-mail : admin@sirapat.com</p>
        </div>
        <hr class="divider">

        <div class="isi-body">
            <h3 class="isi-header underline-text">LAPORAN RAPAT</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peserta</th>
                        <th>Judul Rapat</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Status</th>
                        <th>Dibuat Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $rowNumber = 1;
                    @endphp
                    @foreach ($workOrders as $workorder)
                    @php
                        $user = App\Models\User::find($workorder->user_id);
                    @endphp
                        <tr>
                            <td class="td-quantity">{{ $rowNumber++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $workorder->judul_rapat }}</td>
                            <td>{{ $workorder->deskripsi }}</td>
                            <td class="td-quantity">{{ $workorder->tanggal }}</td>
                            <td class="td-quantity">{{ $workorder->waktu_mulai }}</td>
                            <td class="td-quantity">{{ $workorder->waktu_selesai }}</td>
                            <td class="td-quantity">{{ $workorder->status }}</td>
                            <td>{{ $workorder->created_by }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
