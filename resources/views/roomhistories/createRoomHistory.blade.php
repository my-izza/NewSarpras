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
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data History Ruang</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('store-room-history') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <h6>Nomor Ruang</h6>
                                            <select class="form-control input-default @error('no_ruang') is-invalid @enderror" name="no_ruang" id="no_ruang">
                                                <option value="">Pilih Nomor Ruang</option>
                                                @foreach($room as $r)
                                                    <option value="{{ $r->no_ruang }}" {{ old('no_ruang') == $r->no_ruang ? 'selected' : '' }}>{{ $r->no_ruang }} - {{$r->nama_ruang}}</option>
                                                @endforeach
                                            </select>
                                            @error('no_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>TGL Pembangunan</h6>
                                            <input type="date" class="form-control input-default @error('tgl_pembangunan') is-invalid @enderror" name="tgl_pembangunan" value="{{ old('tgl_pembangunan') }}">
                                            @error('tgl_pembangunan') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>TGL Peresmian</h6>
                                            <input type="date" class="form-control input-default @error('tgl_peresmian') is-invalid @enderror" name="tgl_peresmian" value="{{ old('tgl_peresmian') }}">
                                            @error('tgl_peresmian') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>TGL Renovasi</h6>
                                            <input type="date" class="form-control input-default @error('tgl_renovasi') is-invalid @enderror" name="tgl_renovasi" value="{{ old('tgl_renovasi') }}">
                                            @error('tgl_renovasi') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>TGL Perobohan</h6>
                                            <input type="date" class="form-control input-default @error('tgl_perobohan') is-invalid @enderror" name="tgl_perobohan" value="{{ old('tgl_perobohan') }}">
                                            @error('tgl_perobohan') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Biaya Pembangunan</h6>
                                            <input type="text" class="form-control input-default @error('biaya_pembangunan') is-invalid @enderror" name="biaya_pembangunan" value="{{ old('biaya_pembangunan') }}">
                                            @error('biaya_pembangunan') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Harga Jual</h6>
                                            <input type="text" class="form-control input-default @error('harga_penjualan') is-invalid @enderror" name="harga_penjualan" value="{{ old('harga_penjualan') }}">
                                            @error('harga_penjualan') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Deskripsi</h6>
                                            <textarea class="form-control input-default @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
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
