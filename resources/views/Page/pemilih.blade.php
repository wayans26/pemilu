@extends('Page.master')
@section('pemilih', 'active')
@section('konten')

@if (Session::has('status-tambah-berhasil'))
<script>
    successAlert("{!! Session::get('status-tambah-berhasil') !!}");

</script>
@elseif(Session::has('status-tambah-gagal'))
<script>
    errorAlert("{!! Session::get('status-tambah-gagal') !!}");

</script>
@elseif(Session::has('status-update-berhasil'))
<script>
    successAlert("{!! Session::get('status-update-berhasil') !!}");

</script>
@elseif(Session::has('status-update-gagal'))
<script>
    errorAlert("{!! Session::get('status-update-gagal') !!}");

</script>
@elseif(Session::has('status-hapus-berhasil'))
<script>
    successAlert("{!! Session::get('status-hapus-berhasil') !!}");

</script>
@elseif(Session::has('status-hapus-gagal'))
<script>
    errorAlert("{!! Session::get('status-hapus-gagal') !!}");

</script>
@elseif(Session::has('status-active-berhasil'))
<script>
    successAlert("{!! Session::get('status-active-berhasil') !!}");

</script>
@elseif(Session::has('status-active-gagal'))
<script>
    errorAlert("{!! Session::get('status-active-gagal') !!}");

</script>
@endif

<div class="row">
    <div class="card">
        <div class="card-header">
            <center>Daftar Pemilih Tetap - {{$total}}</center>
        </div>
        <div class="card-body">
            <table class="table table-stripped" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Status Memilih</th>
                        <th>Status Registrasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemilih as $key=>$item)
                    <tr>
                        <td>{{$pemilih->firstItem() + $key}}</td>
                        <td>{{$item->nama_lengkap}}</td>
                        <td>{{$item->nim}}</td>
                        <td>{{$item->status_memilih}}</td>
                        <td>{{$item->status_register}}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit{{$item->nim}}"><i
                                    class="fa fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#delete{{$item->nim}}"><i
                                    class="fa fa-trash"></i></a>
                            @if ($item->status_register === 0)
                            <a href="#" data-toggle="modal" data-target="#active{{$item->nim}}"><i
                                    class="fa fa-check"></i></a>
                            @endif
                        </td>
                    </tr>

                    <!-- modal update -->
                    <div class="modal fade" id="edit{{$item->nim}}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Data pemilih</h4>
                                </div>
                                <form method="POST" action="/pemilih/update">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label" style="color: black;">Nim</label>
                                            <input type="text" name="nim" value="{{$item->nim}}" class="form-control"
                                                style="color: white;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" style="color: black;">Nama</label>
                                            <input type="text" name="nama" value="{{$item->nama_lengkap}}"
                                                class="form-control" style="color: black;">
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
                    <div class="modal fade" id="delete{{$item->nim}}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form method="POST" action="/pemilih/hapus">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <input type="text" hidden="true" name="nim" value="{{$item->nim}}">
                                        <h3 style="color: black;">Yakin ingin menghapus data pemilih <center>
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

                    <!-- modal active -->
                    <div class="modal fade" id="active{{$item->nim}}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form method="POST" action="/pemilih/active">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <input type="text" hidden="true" name="nim" value="{{$item->nim}}">
                                        <h3 style="color: black;">Registrasi? <center>
                                                <strong>{{$item->nama_lengkap}}</strong></center>
                                        </h3>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Registrasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
            <br>
            {{$pemilih->links()}}
            <a href="" class="btn btn-success float-right" data-toggle="modal" data-target='#tambah'>Tambah <i
                    class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<!-- modal update -->
<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data pemilih</h4>
            </div>
            <form method="POST" action="/pemilih/tambah">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" style="color: black;">Nama</label>
                        <input type="text" name="nama" class="form-control" style="color: black;">
                    </div>
                    <div class="form-group">
                        <label class="control-label" style="color: black;">Nim</label>
                        <input type="text" name="nim" class="form-control" style="color: black;">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
