<!DOCTYPE html>
<html lang="en">

<head>

    <!-- CSS -->
    @include('partials.css')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('partials.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('partials.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('partials.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
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
                                <h4 class="card-title">REKAP DATA RUANG</h4>
                            </div>
                            <div class="card-body d-md-flex justify-content-md-end">
                                <a href="{{ route('create-inventory') }}" class="btn btn-primary icon-solid icon-plus"> Tambah Data</a>
                                <a href="{{ route('cetak') }}" target="_blank" class="ml-2 btn btn-warning icon-solid icon-printer text-white"> Cetak Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 950px">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>BARCODE</th>
                                                <th >NAMA BARANG</th>
                                                <th>NOMOR BARANG</th>
                                                <th>TGL PEROLEHAN</th>
                                                <th>FOTO</th>
                                                <th style="width: 15%">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($inventory as $i)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td align="center">
                                                        <img src="{{ asset('storage/' . $i->barcode) }}" alt="Barcode" width="100%">
                                                    </td>
                                                    @foreach ($item as $inv)
                                                            <td align="center">{{ $inv->nama_barang }}</td>
                                                    @endforeach
                                                    <td align="center"> {{ $i->no_inventaris }} </td>
                                                    <td align="center"> {{ $i->tgl_peroleh }} </td>
                                                    <td align="center"> <img src="{{ asset('storage/' . $i->foto)}}" alt="" width="100"></td>
                                                    <td class="text-center">
                                                        <form action="{{ route('destroy-inventory', $i->id) }}" method="POST" id="deleteForm_{{ $i->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        
                                                            <a href="{{ route('view-detail', ['id' => $i->id]) }}" class="btn btn-sm btn-info icon-solid icon-eye text-white"></a>
                                                            <a href="{{ route('edit-inventory', $i->id) }}" class="btn btn-sm btn-warning icon-solid icon-pencil text-white"></a>
                                                        
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
                                                <th>BARCODE</th>
                                                <th>NAMA BARANG</th>
                                                <th>NOMOR BARANG</th>
                                                <th>TGL PEROLEHAN</th>
                                                <th>FOTO</th>
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

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('partials.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    //message with sweetalert
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "BERHASIL",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
@elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
@endif
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
        @include('partials.js')
    <!--**********************************
        Scripts
    ***********************************-->

</body>

</html>