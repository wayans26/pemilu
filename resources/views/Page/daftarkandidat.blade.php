@extends('Page.master')
@section('kandidat', 'active')
@section('konten')
@if (Session::has('status-update-berhasil'))
<script>
    successAlert("{!! Session::get('status-update-berhasil') !!}");

</script>
@elseif(Session::has('status-update-gagal'))
<script>
    errorAlert("{!! Session::get('status-update-gagal') !!}");

</script>
@elseif(Session::has('status-tambah-berhasil'))
<script>
    successAlert("{!! Session::get('status-tambah-berhasil') !!}");

</script>
@elseif(Session::has('status-tambah-gagal'))
<script>
    errorAlert("{!! Session::get('status-tambah-gagal') !!}");

</script>
@elseif(Session::has('status-hapus-berhasil'))
<script>
    successAlert("{!! Session::get('status-hapus-berhasil') !!}");

</script>
@endif
<div class="row">
    <div class="card">
        <div class="card-header">
            Daftar Calon Kandidat
            <div class="row">
                @foreach ($kandidat as $key=>$item)                
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <center><img src="{{$item->photo}}"> <br>
                                <h4 style="margin-top: 2vh;">{{$item->nama_lengkap}}</h4>
                            </center>
                        </div>
                        <div class="card-body">
                            <center>
                                <a class="btn btn-primary" href="#" data-toggle="modal"
                                    data-target='#update0{{$item->nim}}'>Update</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal"
                                    data-target='#delete0{{$item->nim}}'>Delete</a>
                            </center>

                        </div>
                    </div>
                </div>

                <!-- modal update -->
                <div class="modal fade" id="update0{{$item->nim}}" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Data Calon Kandidat</h4>
                            </div>
                            <form method="POST" action="/kandidat/update">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <input type="text" name="id_kandidat" value="" hidden="true">
                                    <div class="form-group">
                                        <label class="control-label" style="color: black;">Nim</label>
                                        <input type="text" name="nim" value="0{{$item->nim}}" class="form-control"
                                            style="color: white;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="color: black;">Nama</label>
                                        <input type="text" name="nama" value="{{$item->nama_lengkap}}"
                                            class="form-control" style="color: black;">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="color: black;">Jurusan</label>
                                        <select name="jurusan" class="form-control" style="color: black;">
                                            @if ($item->jurusan === 'Sistem Informasi')
                                            <option value="Sistem Komputer">Sistem Komputer</option>
                                            <option value="Sistem Informasi" selected>Sistem Informasi</option>
                                            @else
                                            <option value="Sistem Komputer" selected>Sistem Komputer</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="btnUpdate">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- modal delete -->
                <div class="modal fade" id="delete0{{$item->nim}}" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <br>
                            <form method="POST" action="/kandidat/hapus">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <input type="text" hidden="true" name="nim" value="{{$item->nim}}">
                                    <h3 style="color: black;">Yakin ingin menghapus data kandidat <center>
                                            <strong>{{$item->nama_lengkap}}</strong></center>
                                    </h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target='#tambah'>Tambah Data
                <i class="fa fa-plus"></i> </a>
        </div>
    </div>
    <div class="card-body">

    </div>
</div>

<!-- modal Tambah -->
<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Calon kandidat</h4>
            </div>
            <form method="POST" action="/kandidat/tambah" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" style="color: black;">Nama</label>
                        <input type="text" name="nama" value="" class="form-control" style="color: black;">
                    </div>
                    <div class="form-group">
                        <label class="control-label" style="color: black;">Nim</label>
                        <input type="text" name="nim" value="" class="form-control" style="color: black;">
                    </div>
                    <div class="form-group">
                        <label class="control-label" style="color: black;">Jurusan</label>
                        <select name="jurusan" class="form-control" selected="selected" style="color: black;">
                            <option value="Sistem Komputer">Sistem Komputer</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>
                    <p>Photo <br>
                        <input type="file" name="gambar"></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnUpdate">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
