<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Barang</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">REKAP DATA Barang</h4>
                            </div>
                            <div class="card-body d-md-flex justify-content-md-end">
                                <a href="{{ route('create-room-history') }}" class="btn btn-primary icon-solid icon-plus"> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 950px">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>NOMOR RUANG</th>
                                                <th>TGL PEMBANGUNAN</th>
                                                <th>TGL PERESMIAN</th>
                                                <th>TGL RENOVASI</th>
                                                <th>BIAYA PEMBANGUNAN</th>
                                                <th>HARGA JUAL</th>
                                                <th style="width: 15%">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($roomHistory as $h)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td align="center"> {{ $h->no_ruang }} </td>
                                                    <td align="center"> {{ $h->tgl_pembangunan }} </td>
                                                    <td align="center"> {{ $h->tgl_peresmian }} </td>
                                                    <td align="center"> {{ $h->tgl_renovasi }} </td>
                                                    <td align="center"> {{ $h->biaya_pembangunan }} </td>
                                                    <td align="right"> {{ $h->harga_penjualan }} </td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy-room-history', $h->id) }}" method="POST">
                                                            <a href="" class="btn btn-sm btn-info icon-solid icon-eye text-white"></a>
                                                            <a href="{{ route('edit-room-history', $h->id) }}" class="btn btn-sm btn-warning icon-solid icon-pencil text-white"></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i class="icon-solid icon-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data Ruang belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>NOMOR RUANG</th>
                                                <th>TGL PEMBANGUNAN</th>
                                                <th>TGL PERESMIAN</th>
                                                <th>TGL RENOVASI</th>
                                                <th>BIAYA PEMBANGUNAN</th>
                                                <th>HARGA JUAL</th>
                                                <th style="width: 15%">AKSI</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('partials.footer')
    </div>

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

    @include('partials.js')

</body>

</html>
