<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Booking</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Data Booking</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemesan</th>
                <th>Jumlah Tiket</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Nama Tempat Wisata</th>
                <th>Nama Tiket</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->nama_pemesan }}</td>
                    <td>{{ $booking->jumlah }}</td>
                    <td>{{ $booking->total_harga }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->tiket->tempatWisata->nama ?? '-' }}</td>
                    <td>{{ $booking->tiket->nama ?? '-' }}</td>
                    <td>{{ $booking->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
