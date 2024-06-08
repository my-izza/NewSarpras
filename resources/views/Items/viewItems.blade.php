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
                                <a href="{{ route('create-item') }}" class="btn btn-primary icon-solid icon-plus"> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 950px">
                                        <thead>
                                            <tr align="center">
                                                <th data-sortable="false" class="no-sort">No</th>
                                                <th>NAMA BARANG</th>
                                                <th>KATEGORI</th>
                                                <th>GAMBAR</th>
                                                <th>MERK</th>
                                                <th>TYPE / BAHAN</th>
                                                <th>HARGA</th>
                                                <th style="width: 15%">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($item as $i)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td align="center"> {{ $i->nama_barang }} </td>
                                                    <td align="center"> {{ $i->kategori }} </td>
                                                    <td align="center"> <img src="{{asset('storage/items/'.$i->gambar)}}" alt="" width="100"></td>
                                                    <td align="center"> {{ $i->merk }} </td>
                                                    <td align="center"> {{ $i->type }} </td>
                                                    <td align="right"> Rp
                                                        {{ number_format($i->harga, 0, ',', '.') }} </td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy-item', $i->id) }}" method="POST">
                                                            <a href="" class="btn btn-sm btn-info icon-solid icon-eye text-white"></a>
                                                            <a href="{{ route('edit-item', $i->id) }}" class="btn btn-sm btn-warning icon-solid icon-pencil text-white"></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="icon-solid icon-trash"></i></button>
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
                                                <th data-sortable="false" class="no-sort">No</th>
                                                <th>NAMA BARANG</th>
                                                <th>KATEGORI</th>
                                                <th>GAMBAR</th>
                                                <th>MERK</th>
                                                <th>TYPE / BAHAN</th>
                                                <th>HARGA</th>
                                                <th style="width: 15%">AKSI</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    {{ $item->links() }}
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
    <script>
        $(document).ready(function() {
            $('th').click(function() {
                if (!$(this).data('sortable')) {
                    return false; // Menghentikan pengurutan jika tidak diizinkan
                }
                // Logika pengurutan disini
            });
        });
    </script>
    
    {{--  Scrip Menampilkan Pesan
    <script>
        

    </script>  --}}

    @include('partials.js')

</body>

</html>