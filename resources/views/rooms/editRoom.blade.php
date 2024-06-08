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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah Data</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah Data Ruang</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('update-room', ['id' => $room->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <h6>Nomor Ruang</h6>
                                            <input type="text" class="form-control input-default @error('no_ruang') is-invalid @enderror" id="no_ruang" name="no_ruang" value="{{ old('no_ruang', $room->no_ruang) }}" placeholder="Misal: 101">
                                            @error('no_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Nama Gedung</h6>
                                            <input type="text" class="form-control input-default @error('gedung') is-invalid @enderror" name="gedung" value="{{ old('gedung', $room->gedung) }}" placeholder="Misal: A">
                                            @error('gedung') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Nama Ruang</h6>
                                            <input type="text" class="form-control input-default @error('nama_ruang') is-invalid @enderror" name="nama_ruang" value="{{ old('nama_ruang', $room->nama_ruang) }}" placeholder="Misal: Biro Administrasi Umum (BAU)">
                                            @error('nama_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Kategori Ruang</h6>
                                            <select class="form-control input-default @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                                <option>Pilih Kategori</option>
                                                @foreach($enumValues as $value)
                                                    <option value="{{ $value }}" {{ old('kategori', $room->kategori) == $value ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Luas</h6>
                                            <input type="text" class="form-control input-default @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas', $room->luas) }}" placeholder="Misal: 7 x 4 M)">
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
                                            <div>
                                                @if($room->foto_depan)
                                                    <img src="{{ asset('storage/rooms/'.$room->foto_depan) }}" alt="User Photo" style="width: 150px; height: 150px;"><br>
                                                @else
                                                    <p>Tidak ada foto tersedia.</p>
                                                @endif
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
                                            <div>
                                                @if($room->foto_ruang)
                                                    <img src="{{ asset('storage/rooms/'.$room->foto_ruang) }}" alt="User Photo" style="width: 150px; height: 150px;"><br>
                                                @else
                                                    <p>Tidak ada foto tersedia.</p>
                                                @endif
                                            </div>
                                            @error('foto_ruang')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Kapasitas Ruang</h6>
                                            <input type="text" class="form-control input-default @error('kapasitas_ruang') is-invalid @enderror" name="kapasitas_ruang" value="{{ old('kapasitas_ruang', $room->kapasitas_ruang) }}" placeholder="Misal: 100 orang)">
                                            @error('kapasitas_ruang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Deskripsi</h6>
                                            <textarea class="form-control input-default @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi', $room->deskripsi) }}</textarea>
                                            @error('deskripsi') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                        <a href="{{ route('view-rooms') }}" class="btn btn-md btn-warning">Cancel</a>
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
