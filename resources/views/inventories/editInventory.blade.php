<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.css')
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
                                    <form action="{{ route('update-inventory', ['id' => $inventory->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <h6>Nomor Inventaris</h6>
                                            <input type="text" class="form-control input-default @error('no_inventaris') is-invalid @enderror" id="no_inventaris" name="no_inventaris" value="{{ old('no_inventaris', $inventory->no_inventaris) }}" placeholder="Misal: 101">
                                            @error('no_inventaris') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <h6>Nama Ruang</h6>
                                            <select class="form-control input-default @error('room_id') is-invalid @enderror" name="room_id" id="room_id">
                                                <option value="">Pilih Nama Ruang</option>
                                                @foreach($room as $r)
                                                    <option value="{{ $r->id }}" @if($r->id == $selectedRoomId) selected @endif>{{ $r->no_ruang }} - {{ $r->nama_ruang }}</option>
                                                @endforeach
                                            </select>       
                                            @error('room_id') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Nama Barang</h6>
                                            <select class="form-control input-default @error('item_id') is-invalid @enderror" name="item_id" id="item_id">
                                                <option value="">Pilih Nama barang</option>
                                                @foreach($item as $r)
                                                    <option value="{{ $r->id }}" @if($r->id == $selectedItemId) selected @endif>{{ $r->nama_barang }} - {{ $r->merk }} - {{ $r->type }}</option>
                                                @endforeach
                                            </select>       
                                            @error('item_id') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Kategori Ruang</h6>
                                            <select class="form-control input-default @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                                <option value="">Pilih Kategori</option>
                                                @foreach($enumValues as $value)
                                                    <option value="{{ $value }}" {{ $inventory->kategori == $value ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Harga</h6>
                                            <input type="text" class="form-control input-default @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $inventory->harga) }}" placeholder="Misal: 1000000">
                                            @error('harga') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Aset</h6>
                                            <select class="form-control input-default @error('aset') is-invalid @enderror" name="aset" id="aset">
                                                <option value="">Pilih Aset</option>
                                                @foreach($enumValuesAset as $aset)
                                                    <option value="{{ $aset }}" {{ $inventory->aset == $aset ? 'selected' : '' }}>{{ $aset }}</option>
                                                @endforeach
                                            </select>
                                            @error('aset') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Tgl Perolehan</h6>
                                            <input type="date" class="form-control input-default @error('tgl_peroleh') is-invalid @enderror" name="tgl_peroleh" value="{{ old('tgl_peroleh', $inventory->tgl_peroleh) }}">
                                            @error('tgl_peroleh') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Jumlah Barang</h6>
                                            <input type="text" class="form-control input-default @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" value="{{ old('jumlah_barang', $inventory->jumlah_barang) }}">
                                            @error('jumlah_barang') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Total Harga</h6>
                                            <input type="text" class="form-control input-default @error('total_harga') is-invalid @enderror" name="total_harga" value="{{ old('total_harga', $inventory->total_harga) }}">
                                            @error('total_harga') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group">
                                            <h6>Deskripsi</h6>
                                            <textarea class="form-control input-default @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi', $inventory->deskripsi) }}</textarea>
                                            @error('deskripsi') <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <h6>Foto</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control @error('foto') is-invalid @enderror" name="foto" id="foto">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            @if($inventory->foto)
                                                <img src="{{ asset('storage/' . $inventory->foto) }}" alt="Foto" style="width: 150px; height: 150px;"><br>
                                            @else
                                                <p>Tidak ada foto tersedia.</p>
                                            @endif
                                            @error('foto')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                        <button type="button" onclick="window.location.href='{{ route('view-rooms') }}'" class="btn btn-md btn-warning">Cancel</button>
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
</body>
</html>
