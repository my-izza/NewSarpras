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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Barang</a></li>
                        </ol>
                    </div>
                </div>

                <!-- row -->
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
                                                <th data-sortable="false" class="no-sort">No</th>
                                                <th>NOMOR RUANG</th>
                                                <th>TGL PEMBANGUNAN</th>
                                                <th>BIAYA PEMBANGUNAN</th>
                                                <th>DESKRIPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($roomHistory as $h)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td align="center"> {{ $h->no_ruang }} </td>
                                                    <td align="center"> {{ $h->tgl_pembangunan }} </td>
                                                    <td align="center"> {{ $h->biaya_pembangunan }} </td>
                                                    <td align="center"> {{ $h->deskripsi }} </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data Ruang belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr align="center">
                                                <th data-sortable="false" class="no-sort">No</th>
                                                <th>NOMOR RUANG</th>
                                                <th>TGL PEMBANGUNAN</th>
                                                <th>BIAYA PEMBANGUNAN</th>
                                                <th>DESKRIPSI</th>
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
    
    {{--  Scrip Menampilkan Pesan
    <script>
        

    </script>  --}}

    @include('partials.js')

</body>

</html>