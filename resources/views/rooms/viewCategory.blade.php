<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
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

                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rekap Data {{ $category }}</h4>
                            </div>
                            <div class="card-body d-md-flex justify-content-md-end">
                                <a href="{{ route('create-room') }}" class="btn btn-primary icon-solid icon-plus"> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 950px">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>NOMOR RUANG</th>
                                                <th >NAMA RUANG</th>
                                                <th>KATEGORI</th>
                                                <th>LUAS</th>
                                                <th >FOTO DEPAN</th>
                                                <th>KAPASITAS</th>
                                                <th style="width: 15%">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($room as $r)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td align="center"> {{ $r->no_ruang }} </td>
                                                    <td align="left"> {{ $r->nama_ruang }} </td>
                                                    <td align="center"> {{ $r->kategori }} </td>
                                                    <td align="right"> {{ $r->luas }} </td>
                                                    <td align="center"> <img src="{{ asset('storage/rooms/'.$r->foto_depan) }}" alt="" width="100"></td>
                                                    <td align="center"> {{ $r->kapasitas_ruang }} </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('destroy-room', $r->id) }}" method="POST" id="deleteForm_{{ $r->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('view-detail', ['id' => $r->id]) }}" class="btn btn-sm btn-info icon-solid icon-eye text-white"></a>
                                                            <a href="{{ route('edit-room', $r->id) }}" class="btn btn-sm btn-warning icon-solid icon-pencil text-white"></a>
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?');">
                                                                <i class="icon-solid icon-trash text-white"></i>
                                                            </button>
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
                                                <th>NAMA RUANG</th>
                                                <th>KATEGORI</th>
                                                <th>LUAS</th>
                                                <th>FOTO DEPAN</th>
                                                <th>KAPASITAS</th>
                                                <th>AKSI</th>
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
