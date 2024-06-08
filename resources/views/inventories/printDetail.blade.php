<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('./assets/images/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cetak Rekap Ruang</title>
    {{--  Table Style  --}}
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 px;
            text-align: center;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
            margin-right: 20px;
        }
        .header .title {
            flex-grow: 1;
        }
        .header h5 {
            margin: 5px 0;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }
        .custom-table, .custom-table th, .custom-table td {
            border: 1px solid black;
        }
        .custom-table th, .custom-table td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="form-group m-3">
        <div class="container">
            <div class="header">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                <div class="title">
                    <h5>REKAP PRASARANA <b>GEDUNG</b></h5>
                    <h5>BIRO ADMINISTRASI UMUM (BAU)</h5>
                    <h5>UNIVERSITAS ISLAM ZAINUL HASAN GENGGONG - PROBOLINGGO</h5>
                    <h5>TAHUN AKADEMIK 2023 - 2024</h5>
                </div>
            </div>
        </div>
            <!-- row -->
                <div class="row mt-3">
                    <div class="col-12">
                            <div class="title" align="left">
                                <h5>HISTORI RUANG : NOMOR <b>{{$no_ruang}}</b></h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <table class="custom-table">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Keterangan Ruang</th>
                                                <th>Informasi Ruang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($room as $r)
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Nomor Ruang</td>
                                                    <td align="center"> {{ $r->no_ruang }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Nama Gedung</td>
                                                    <td align="center"> {{ $r->gedung }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Nama Ruang</td>
                                                    <td align="center"> {{ $r->nama_ruang }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Kategori Ruang</td>
                                                    <td align="center"> {{ $r->kategori }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Luas Ruangan</td>
                                                    <td align="center"> {{ $r->luas }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Foto Ruang</td>
                                                    <td align="center"> <img src="{{asset('storage/rooms/'.$r->foto_depan)}}" alt="" width="100"> <img src="{{asset('storage/rooms/'.$r->foto_ruang)}}" alt=""  width="100"> </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Kapasitas Ruangan</td>
                                                    <td align="center"> {{ $r->kapasitas_ruang }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Infromasi Tambahan</td>
                                                    <td align="center"> {{ $r->deskripsi }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Tanggal Pembangunan</td>
                                                    <td align="center">
                                                        {{ $pembangunanUpdate }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Biaya Pembangunan</td>
                                                    <td align="center">Rp
                                                        {{ number_format($biayaUpdate, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Tanggal Peresmian</td>
                                                    <td align="center">
                                                        @foreach ($histories as $history)
                                                        {{ $history->tgl_peresmian }}<br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Tanggal Renovasi</td>
                                                    <td align="center">
                                                        @foreach ($histories as $history)
                                                        {{ $history->tgl_renovasi }}<br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Tanggal Pembongkaran</td>
                                                    <td align="center">
                                                        {{ $pembongkaranUpdate }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Nilai Jual</td>
                                                    <td align="center">Rp
                                                        {{ number_format($penjualanUpdate, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Deskripsi Tambahan Histori Ruang</td>
                                                    <td align="center">
                                                        @foreach ($histories as $history)
                                                        {{ $history->deskripsi }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }}.</td>
                                                    <td>Tearkhir Diubah</td>
                                                    <td align="center">{{ $lastUpdate }}</td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data Ruang belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>