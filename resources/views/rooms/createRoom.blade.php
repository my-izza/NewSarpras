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
                                <h4 class="card-title">Tambah Data Ruang</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('store-room')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h6>Nomor Ruang</h6>
                                            <input type="text" class="form-control input-default @error('no_ruang') is-invalid @enderror" id="no_ruang" name="no_ruang" value="{{ old('no_ruang') }}" placeholder="Misal: 101">
                                            @error('no_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Nama Gedung</h6>
                                            <input type="text" class="form-control input-default @error('gedung') is-invalid @enderror" name="gedung" value="{{ old('gedung') }}" placeholder="Misal: A">
                                            @error('gedung') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Nama Ruang</h6>
                                            <input type="text" class="form-control input-default @error('nama_ruang') is-invalid @enderror" name="nama_ruang" value="{{ old('nama_ruang') }}" placeholder="Misal: Biro Administrasi Perencanaan dan Sistem Informasi">
                                            @error('nama_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Kategori Ruang</h6>
                                            <select class="form-control input-default @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                                <option value="">Pilih Kategori Ruang</option>
                                                <option value="Kantor" {{ old('kategori') == 'Kantor' ? 'selected' : '' }}>Kantor</option>
                                                <option value="Kelas" {{ old('kategori') == 'Kelas' ? 'selected' : '' }}>Kelas</option>
                                                <option value="Fasilitas Umum" {{ old('kategori') == 'Fasilitas Umum' ? 'selected' : '' }}>Fasilitas Umum</option>
                                            </select>
                                            @error('kategori') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Luas</h6>
                                            <input type="text" class="form-control input-default @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas') }}" placeholder="Misal: 3 x 6 m">
                                            @error('luas') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Foto Depan Ruang</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="foto_depan" class="form-control custom-file-input @error('foto_depan') is-invalid @enderror" id="foto_depan">
                                                    <label class="custom-file-label" for="foto_depan">Choose file</label>
                                                </div>
                                            </div>
                                            @error('foto_depan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Foto Ruang</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control custom-file-input @error('foto_ruang') is-invalid @enderror" id="foto_ruang" name="foto_ruang">
                                                    <label class="custom-file-label" for="foto_ruang">Choose file</label>
                                                </div>
                                            </div>
                                            @error('foto_ruang')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Kapasitas Ruangan</h6>
                                            <input type="text" class="form-control input-default @error('kapasitas_ruang') is-invalid @enderror" name="kapasitas_ruang" value="{{ old('kapasitas_ruang') }}" placeholder="Misal: 20 orang">
                                            @error('kapasitas_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
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
    <script>
        // Display the selected file name
        document.querySelectorAll('.custom-file-input').forEach((input) => {
            input.addEventListener('change', function (e) {
                let fileName = e.target.files[0].name;
                let nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        });
    </script>
</body>
</html>
