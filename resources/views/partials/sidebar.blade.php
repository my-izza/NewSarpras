<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li ><a href="{{ route('index') }}" aria-expanded="false"><i
                        class="icon text-warning icon-home"></i><span class="nav-text">BERANDA</span></a>
            </li>

            <li class="nav-label">PRASARANA</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon text-warning icon-app-store"></i><span class="nav-text">DATA RUANG</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('view-rooms')}}">Rekap Ruang</a></li>
                    <li><a href="{{route('category', 'Kantor')}}">Kantor</a></li>
                    <li><a href="{{route('category', 'Kelas')}}">Kelas</a></li>
                    <li><a href="{{route('category', 'Fasilitas Umum')}}">Fasilitas Umum</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="icon text-warning icon-app-store"></i><span class="nav-text">HISTORY RUANG</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('view-room-histories')}}">Rekap Histori Ruang</a></li>
                    <li><a href="{{route('view-pembangunan')}}">Histori Pembangunan</a></li>
                </ul>
            </li>

            <li class="nav-label">SARANA</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon text-warning icon-single-copy-06"></i><span class="nav-text">DATA INVENTARIS</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('view-inventories')}}">Rekap Inventaris</a></li>
                    <li><a href="#">Elektronik</a></li>
                    <li><a href="#">Meubeler</a></li>
                    <li><a href="#">Umum</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="icon text-warning icon-single-copy-06"></i><span class="nav-text">DATA BARANG</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('view-items')}}">Rekap Barang</a></li>
                </ul>
            </li>

            <li class="nav-label">ASSETS KAMPUS</li>
            <li><a href="#" aria-expanded="false"><i
                        class="icon text-warning icon-chart-bar-33"></i><span class="nav-text">DATA ASSETS</span></a></li>
        </ul>
    </div>


</div>