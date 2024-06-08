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

        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>PRASARANA</h4>
                            <span class="ml-1">Biro Administrasi Umum</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Ruang</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah Data</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" >Ubah Data Histori Ruang</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('update-room-history', ['id' => $roomHistory->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        {{--  Nomor Ruang  --}}
                                        <div class="form-group">
                                            <h6>Nomor Ruang</h6>
                                            <select class="form-control input-default @error('no_ruang') is-invalid @enderror" name="no_ruang" id="no_ruang">
                                                <option value="">Pilih Nomor Ruang</option>
                                                @foreach($room as $r)
                                                    <option value="{{ $r->no_ruang }}" @if($r->id == $selectedRoomId) selected @endif>{{ $r->no_ruang }}</option>
                                                @endforeach
                                            </select>                                            
                                        <!-- error message untuk nomor ruang -->
                                        @error('no_ruang') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Nomor Ruang  --}}
                                        <div class="form-group">
                                            <h6>Nama Ruang</h6>
                                            <select class="form-control input-default @error('room_id') is-invalid @enderror" name="room_id" id="room_id">
                                                <option value="">Pilih Nomor Ruang</option>
                                                @foreach($room as $r)
                                                    <option value="{{ $r->id }}" @if($r->id == $selectedRoomId) selected @endif>{{ $r->nama_ruang }}</option>
                                                @endforeach
                                            </select>                                            
                                        <!-- error message untuk nomor ruang -->
                                        @error('room_id') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Tanggal Pembangunan Gedung  --}}
                                        <div class="form-group">
                                            <h6>Tanggal Pembangunan</h6>
                                            <input type="date" class="form-control input-default @error('tgl_pembangunan') is-invalid @enderror" name="tgl_pembangunan" value="{{ old('tgl_pembangunan', $roomHistory->tgl_pembangunan) }}">
                                        <!-- error message untuk nama tgl_pembangunan -->
                                        @error('tgl_pembangunan') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        
                                        
                                        {{--  Tanggal Peresmian Gedung  --}}
                                        <div class="form-group">
                                            <h6>Tanggal Peresmian</h6>
                                            <input type="date" class="form-control input-default @error('tgl_peresmian') is-invalid @enderror" name="tgl_peresmian" value="{{ old('tgl_peresmian', $roomHistory->tgl_peresmian) }}">
                                        <!-- error message untuk nama tgl_peresmian -->
                                        @error('tgl_peresmian') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Tanggal Renovasi Gedung  --}}
                                        <div class="form-group">
                                            <h6>Tanggal Renovasi</h6>
                                            <input type="date" class="form-control input-default @error('tgl_renovasi') is-invalid @enderror" name="tgl_renovasi" value="{{ old('tgl_renovasi', $roomHistory->tgl_renovasi) }}">
                                        <!-- error message untuk nama tgl_renovasi -->
                                        @error('tgl_renovasi') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Tanggal Perobohan Gedung  --}}
                                        <div class="form-group">
                                            <h6>Tanggal Pembongkaran</h6>
                                            <input type="date" class="form-control input-default @error('tgl_perobohan') is-invalid @enderror" name="tgl_perobohan" value="{{ old('tgl_perobohan', $roomHistory->tgl_perobohan) }}">
                                        <!-- error message untuk nama tgl_perobohan -->
                                        @error('tgl_perobohan') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Biaya Pembangunan Gedung  --}}
                                        <div class="form-group">
                                            <h6>Biaya Pembangunan</h6>
                                            <input type="text" class="form-control input-default @error('biaya_pembangunan') is-invalid @enderror" name="biaya_pembangunan" value="{{ old('biaya_pembangunan', $roomHistory->biaya_pembangunan) }}">
                                        <!-- error message untuk nama biaya_pembangunan -->
                                        @error('biaya_pembangunan') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Harga Penjualan Gedung  --}}
                                        <div class="form-group">
                                            <h6>Harga Penjualan</h6>
                                            <input type="text" class="form-control input-default @error('harga_penjualan') is-invalid @enderror" name="harga_penjualan" value="{{ old('harga_penjualan', $roomHistory->harga_penjualan) }}">
                                        <!-- error message untuk nama harga_penjualan -->
                                        @error('harga_penjualan') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Deskripsi  --}}
                                        <div class="form-group">
                                            <h6>Deskripsi</h6>
                                            <textarea type="text" class="form-control input-default @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi', $roomHistory->deskripsi) }}"> {{$roomHistory->deskripsi}}</textarea>
                                        <!-- error message untuk deskripsi -->
                                        @error('deskripsi') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        </div>

                                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                        <button type="cancel" onclick="{{route('view-rooms')}}" class="btn btn-md btn-warning">Cancel</button>
                            
                                    </form>
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
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
        @include('partials.js')
    <!--**********************************
        Scripts end
    ***********************************-->

</body>

</html>