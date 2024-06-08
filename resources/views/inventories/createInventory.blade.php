<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.header')
        @include('partials.sidebar')

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Tambah Inventaris</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data Inventaris</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('store-inventory') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nomor Inventaris</label>
                                            <input type="text" class="form-control input-default @error('no_inventaris') is-invalid @enderror" name="no_inventaris" value="{{ old('no_inventaris') }}">
                                            @error('no_inventaris')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ruang</label>
                                            <select class="form-control input-default @error('room_id') is-invalid @enderror" name="room_id">
                                                <option value="">Pilih Ruang</option>
                                                @foreach($room as $r)
                                                    <option value="{{ $r->id }}">{{ $r->nama_ruang }}</option>
                                                @endforeach
                                            </select>
                                            @error('room_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select class="form-control input-default @error('item_id') is-invalid @enderror" name="item_id" id="item_id">
                                                <option value="">Pilih Barang</option>
                                                @foreach($item as $i)
                                                    <option value="{{ $i->id }}">{{ $i->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                            @error('item_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control input-default @error('kategori') is-invalid @enderror" name="kategori">
                                                <option value="">Pilih Kategori</option>
                                                <option value="Elektronik">Elektronik</option>
                                                <option value="Meubeler">Meubeler</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            @error('kategori')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control input-default @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga') }}">
                                            @error('harga')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Aset</label>
                                            <select class="form-control input-default @error('aset') is-invalid @enderror" name="aset">
                                                <option value="">Pilih Aset</option>
                                                <option value="Terhitung">Terhitung</option>
                                                <option value="Tidak Terhitung">Tidak Terhitung</option>
                                            </select>
                                            @error('aset')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Peroleh</label>
                                            <input type="date" class="form-control input-default @error('tgl_peroleh') is-invalid @enderror" name="tgl_peroleh" value="{{ old('tgl_peroleh') }}">
                                            @error('tgl_peroleh')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Barang</label>
                                            <input type="text" class="form-control input-default @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" value="{{ old('jumlah_barang') }}">
                                            @error('jumlah_barang')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <input type="text" class="form-control input-default @error('total_harga') is-invalid @enderror" name="total_harga" value="{{ old('total_harga') }}">
                                            @error('total_harga')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control input-default @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            @error('foto')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
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

    <script>
        $(document).ready(function() {
            $('#item_id').change(function() {
                var itemId = $(this).val();
                if (itemId) {
                    $.ajax({
                        url: "{{ url('/items') }}/" + itemId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#harga').val(data.harga);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

    @include('partials.js')

</body>

</html>
