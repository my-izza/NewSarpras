<!DOCTYPE html>
<html lang="en">

<head>

    <!-- CSS -->
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
                                            @php $no = 1; @endphp
                                            @forelse ($room as $r)
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Nomor Ruang</td>
                                                    <td align="center"> {{ $r->no_ruang }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Nama Gedung</td>
                                                    <td align="center"> {{ $r->gedung }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Nama Ruang</td>
                                                    <td align="center"> {{ $r->nama_ruang }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Kategori Ruang</td>
                                                    <td align="center"> {{ $r->kategori }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Luas Ruangan</td>
                                                    <td align="center"> {{ $r->luas }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Foto Ruang</td>
                                                    <td align="center"> <img src="{{asset('storage/rooms/'.$r->foto_depan)}}" alt="" width="100"> <img src="{{asset('storage/rooms/'.$r->foto_ruang)}}" alt=""  width="100"> </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Kapasitas Ruangan</td>
                                                    <td align="center"> {{ $r->kapasitas_ruang }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Infromasi Tambahan</td>
                                                    <td align="center"> {{ $r->deskripsi }} </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Tanggal Pembangunan</td>
                                                    <td align="center">
                                                        {{ $pembangunanUpdate }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
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
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Tanggal Renovasi</td>
                                                    <td align="center">
                                                        @foreach ($histories as $history)
                                                        {{ $history->tgl_renovasi }}<br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Tanggal Pembongkaran</td>
                                                    <td align="center">
                                                        {{ $pembongkaranUpdate }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Nilai Jual</td>
                                                    <td align="center">Rp
                                                        {{ number_format($penjualanUpdate, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
                                                    <td>Deskripsi Tambahan Histori Ruang</td>
                                                    <td align="center">
                                                        @foreach ($histories as $history)
                                                        {{ $history->deskripsi }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">{{ $no++ }} .</td>
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
                                    
                                    <div class="card-body d-md-flex justify-content-md-end">
                                        <a href="{{ route('cetak-detail', $r->id) }}) }}" target="_blank" class="btn btn-warning icon-solid icon-printer text-white"> Cetak Data</a>
                                    </div>
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
    End Scripts
***********************************-->
</body>

</html>
