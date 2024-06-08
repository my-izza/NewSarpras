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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" >Tambah Data Barang</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('store-item') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{--  Nama Barang  --}}
                                        <div class="form-group">
                                            <h6>Nama Barang</h6>
                                            <input type="text" class="form-control input-default @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Misal: Printer Scanner">
                                        <!-- error message untuk nama nama_barang -->
                                        @error('nama_barang') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Foto Barang  --}}
                                        <div class="form-group">
                                            <h6>Foto Barang</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="gambar" class="form control-file custom-file-input form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{ old('gambar') }}">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- error message untuk foto depan -->
                                            @error('gambar')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{--  Kategori  --}}
                                        <div class="form-group">
                                            <h6>Kategori Barang</h6>
                                            <select class="form-control input-default @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}"  name="kategori" id="kategori">
                                                <option>Pilih Kategori Barang</option>
                                                <option value="Elektronik">Elektronik</option>
                                                <option value="Meubeler">Meubeler</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <!-- error message untuk nama ruang -->
                                        @error('kategori') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                    
                                        {{--  Merek Barang  --}}
                                        <div class="form-group">
                                            <h6>Merek Barang</h6>
                                            <input type="text" class="form-control input-default @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" placeholder="Misal: CANON">
                                        <!-- error message untuk Merek Barang -->
                                        @error('merk') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        
                                        {{--  Type / Bahan  --}}
                                        <div class="form-group">
                                            <h6>Type / Bahan</h6>
                                            <input type="text" class="form-control input-default @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" placeholder="Misal: MP280">
                                        <!-- error message untuk type -->
                                        @error('type') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{--  Harga Barang  --}}
                                        <div class="form-group">
                                            <h6>Harga Barang</h6>
                                            <input type="text" class="form-control input-default @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Misal: 1500000">
                                        <!-- error message untuk harga -->
                                        @error('harga') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>

                                        {{-- Deskripsi --}}
                                        <div class="form-group">
                                            <h6>Deskripsi</h6>
                                            <textarea type="text" class="form-control input-default @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}">

                                            </textarea>
                                        <!-- error message untuk deskrpsi -->
                                        @error('deskripsi') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        </div>

                                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            
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
    {{--  Scrip Menampilkan Pesan  --}}

    @include('partials.js')

</body>

</html>