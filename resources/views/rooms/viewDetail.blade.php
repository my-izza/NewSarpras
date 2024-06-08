<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.css')
    <style>
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
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.header')
        @include('partials.sidebar')
        <div class="content-body text-dark">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>PRASARANA</h4>
                            <p class="mb-0">Biro Administrasi Umum</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Ruang</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">HISTORI RUANG NOMOR {{$no_ruang}}</h4>
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
                                            <tr>
                                                <td align="center">1.</td>
                                                <td>Nomor Ruang</td>
                                                <td align="center"> {{ $room->no_ruang }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">2.</td>
                                                <td>Nama Gedung</td>
                                                <td align="center"> {{ $room->gedung }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">3.</td>
                                                <td>Nama Ruang</td>
                                                <td align="center"> {{ $room->nama_ruang }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">4.</td>
                                                <td>Kategori Ruang</td>
                                                <td align="center"> {{ $room->kategori }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">5.</td>
                                                <td>Luas Ruangan</td>
                                                <td align="center"> {{ $room->luas }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">6.</td>
                                                <td>Foto Ruang</td>
                                                <td align="center">
                                                    <img src="{{ asset('storage/rooms/'.$room->foto_depan) }}" alt="" width="100">
                                                    <img src="{{ asset('storage/rooms/'.$room->foto_ruang) }}" alt="" width="100">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">7.</td>
                                                <td>Kapasitas Ruangan</td>
                                                <td align="center"> {{ $room->kapasitas_ruang }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">8.</td>
                                                <td>Informasi Tambahan</td>
                                                <td align="center"> {{ $room->deskripsi }} </td>
                                            </tr>
                                            <tr>
                                                <td align="center">9.</td>
                                                <td>Tanggal Pembangunan</td>
                                                <td align="center">{{ $pembangunanUpdate }}</td>
                                            </tr>
                                            <tr>
                                                <td align="center">10.</td>
                                                <td>Biaya Pembangunan</td>
                                                <td align="center">Rp {{ number_format($biayaUpdate, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td align="center">11.</td>
                                                <td>Tanggal Peresmian</td>
                                                <td align="center">
                                                    @foreach ($histories as $history)
                                                        {{ $history->tgl_peresmian }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">12.</td>
                                                <td>Tanggal Renovasi</td>
                                                <td align="center">
                                                    @foreach ($histories as $history)
                                                        {{ $history->tgl_renovasi }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">13.</td>
                                                <td>Tanggal Pembongkaran</td>
                                                <td align="center">{{ $pembongkaranUpdate }}</td>
                                            </tr>
                                            <tr>
                                                <td align="center">14.</td>
                                                <td>Nilai Jual</td>
                                                <td align="center">Rp {{ number_format($penjualanUpdate, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td align="center">15.</td>
                                                <td>Deskripsi Tambahan Histori Ruang</td>
                                                <td align="center">
                                                    @foreach ($histories as $history)
                                                        {{ $history->deskripsi }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">16.</td>
                                                <td>Terakhir Diubah</td>
                                                <td align="center">{{ $lastUpdate }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-body d-md-flex justify-content-md-end">
                                        <a href="{{ route('cetak-detail', $room->id) }}" target="_blank" class="btn btn-warning icon-solid icon-printer text-white"> Cetak Data</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </div>

    @include('partials.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
</body>

</html>
