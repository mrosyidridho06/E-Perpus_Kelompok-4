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
    <h3 class="content-header-title mb-0 d-inline-block">Buku</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="pages">Home</a>
                </li>
                <li class="breadcrumb-item active">Buku
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
                <h4 class="card-title">Daftar Buku</h4>
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
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($buku as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $item->kodeBuku }}</td>
                                <td class="text-capitalize">{{ $item->judulBuku }}</td>
                                <td class="text-capitalize">{{ $item->penerbit }}</td>
                                <td class="text-capitalize">{{ $item->tahunTerbit }}</td>
                                <td class="text-capitalize">{{ $item->stok }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button class="dropdown-item editBukuButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Ubah
                                            </button>
                                            <button class="dropdown-item deleteBukuButton" value="{{ $item->id }}">
                                                <i class="la la-trash"></i> Hapus
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
                <h4 class="modal-title white">Tambah Buku</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('daftarBuku.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Judul Buku</label>
                        <input type="text" name="judulbuku" placeholder="Judul Buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penerbit</label>
                        <input type="text" name="penerbit" placeholder="Penerbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Terbit</label>
                        <input type="text" name="tahunterbit" placeholder="Tahun terbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penulis</label>
                        <input type="text" name="penulis" placeholder="Penulis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input type="text" name="kodebuku" placeholder="Kode Buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" name="jumlah" placeholder="Jumlah" class="form-control" required>
                    </div>
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
                <h4 class="modal-title white">Edit Buku</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editBukuForm" method="post">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Judul Buku</label>
                        <input type="text" name="judulbuku" id="editjudulbuku" placeholder="Judul Buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penerbit</label>
                        <input type="text" name="penerbit" id="editpenerbit" placeholder="Penerbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Terbit</label>
                        <input type="text" name="tahunterbit" id="edittahunterbit" placeholder="Tahun terbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penulis</label>
                        <input type="text" name="penulis" id="editpenulis" placeholder="Penulis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input type="text" name="kodebuku" placeholder="Kode Buku" id="editkodebuku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" name="jumlah" placeholder="Jumlah" id="editjumlah" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<div class="modal fade" id="deleteBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteBukuForm" method="post">
                <div class="modal-footer">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-danger">Iya, hapus</button>
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
 
    $(document).on("click", ".editBukuButton", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{ route('daftarBuku.index') }}/" + id + "/edit"
        }).done(function(response) {
            console.log(response);
            $("#editjudulbuku").val(response.judulBuku);
            $("#editpenerbit").val(response.penerbit);
            $("#edittahunterbit").val(response.tahunTerbit);
            $("#editpenulis").val(response.penulis);
            $("#editkodebuku").val(response.kodeBuku);
            $("#editjumlah").val(response.stok);
            $("#editBukuForm").attr("action", "{{ route('daftarBuku.index') }}/" + id)
            $("#editBukuModal").modal();
        })
    });
 
    $(document).on("click", ".deleteBukuButton", function() {
        let id = $(this).val();
 
        $("#deleteBukuForm").attr("action", "{{ route('daftarBuku.index') }}/" + id)
        $("#deleteBukuModal").modal();
    });
</script>
@endsection