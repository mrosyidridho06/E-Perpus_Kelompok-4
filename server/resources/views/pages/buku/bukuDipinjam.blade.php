@extends('layouts.dashboard')
 
@section('title', 'Data Buku')
 
@section('style')
<style>
    .page-item.active .page-link {
        color: #FFF !important;
        background-color: #1E9FF2 !important;
        border-color: #1E9FF2 !important;
    }
 
    .pagination .page-lin {
        color: blue !important;
    }
</style>
@endsection
 
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Buku Dipnjam</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="pages">Home</a>
                </li>
                <li class="breadcrumb-item active">Buku Dipinjam
                </li>
            </ol>
        </div>
    </div>
</div>
 
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <button class="btn btn-info rounded-0 mb-1" id="createBukuButton" type="button">Tambah</button>
    </div>
</div>
 
@endsection
 
@section('content')
@if(session('ERR'))
<div class="alert alert-danger" role="alert">
    {{ session('ERR') }}
</div>
@endif
@if(session('OK'))
<div class="alert alert-success" role="alert">
    {{ session('OK') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buku Dipinjam</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered table-responsive zero-configuration datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>ID Peminjam</th>
                                <th>Nama Peminjam</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($bukuDipinjam as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $item->buku->kodeBuku }}</td>
                                <td class="text-capitalize">{{ $item->buku->judulBuku }}</td>
                                <td class="text-capitalize">{{ $item->anggota->nim }}</td>
                                <td class="text-capitalize">{{ $item->anggota->nama }}</td>
                                <td class="text-capitalize">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                <td class="text-capitalize">{{ \Carbon\Carbon::parse($item->updated_at)->addDays(7)->format('d/m/Y')}}</td>
                                {{-- {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}} --}}
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button id="Perpanjang" class="dropdown-item editBukuButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Perpanjang
                                            </button>
                                            <button id="kembalikan" class="dropdown-item deleteBukuButton" value="{{ $item->id }}">
                                                <i class="la la-trash"></i> Kembalikan
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div class="modal fade" id="createBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Pinjam Buku</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('bukuDipinjam.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input type="text" id="kodebuku" name="kodebuku" placeholder="Judul Buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Buku</label>
                        <input type="text" name="judulbuku" id="judulbuku" placeholder="Judul Buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Terbit</label>
                        <input type="text" name="tahunterbit" id="tahunterbit"  placeholder="Tahun terbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penulis</label>
                        <input type="text" name="penulis" id="penulis" placeholder="Penulis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIM Peminjam</label>
                        <input type="text" name="nim" id="nim" placeholder="ID Peminjam" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Peminjam</label>
                        <input type="text" name="namapeminjam" id="namaanggota" placeholder="Nama Peminjam" class="form-control" required>
                    </div>
                    <input type="hidden" name="bukuid" id="bukuid">
                    <input type="hidden" name="anggotaid" id="anggotaid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-info">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<div class="modal fade" id="editBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Perpanjang Buku</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> 
            <form action="" id="editBukuForm" method="post">
                <div class="modal-footer">
                    @csrf
                    @method("GET")
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-outline-danger">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<div class="modal fade" id="deleteBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Buku Di kembalikan ?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteBukuForm" method="post">
                <div class="modal-footer">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-outline-danger">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
@endsection
 
@section('script')
<script>
    $(document).on("change", "#yearSelect", function() {
        console.log('true');
        $("#yearButton").click();
    });
    $(document).on("click", "#createBukuButton", function() {
        $("#createBukuModal").modal();
    });
 
    $(document).on("keyup", "#kodebuku", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "bukuDipinjam-showBuku?id=" + id
        }).done(function(response) {
            console.log(response);
            $("#judulbuku").val(response.judulBuku);
            $("#penerbit").val(response.penerbit);
            $("#tahunterbit").val(response.tahunTerbit);
            $("#penulis").val(response.penulis);
            $("#bukuid").val(response.id);
        })
    
    });
    $(document).on("keyup", "#nim", function() {
        let nim = $(this).val();
        $.ajax({
            method: "GET",
            url: "bukuDipinjam-showAnggota?nim=" + nim
        }).done(function(response) {
            console.log(response);
            // $("#nim").val(response.nim);
            $("#namaanggota").val(response.nama);
            $("#anggotaid").val(response.id);
            
        })
    
    });


    $(document).on("click", ".editBukuButton", function() {
        let id = $(this).val();
        $("#editBukuForm").attr("action", "bukuDipinjam-perpanjang?id=" + id)
        $("#editBukuModal").modal();
    });

    $(document).on("click", ".deleteBukuButton", function() {
        let id = $(this).val();
        $("#deleteBukuForm").attr("action", "{{ route('bukuDipinjam.index') }}/" + id)
        $("#deleteBukuModal").modal();
    });
</script>
@endsection