@extends('Page.master')
@section('kandidat', 'active')
@section('konten')
<div class="row">
    <div class="card">
        <div class="card-header">
            Daftar Calon Kandidat
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <center><img src="assets/img/anime3.png"></center>
                        </div>
                        <div class="card-body">
                            <center>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target='#update'>Update</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target='#delete'>Delete</a>
                            </center>
                            <div class="modal fade" id="update" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">UPDATE DATA CALON KANDIDAT</h4>
                                        </div>
                                        <form method="GET" action="">
                                            <div class="modal-body">
                                                <input type="text" name="id_kandidat" value="" hidden="true">
                                                <div class="form-group">
                                                    <label class="control-label" style="color: black;">Nama</label>
                                                    <input type="text" name="nama" value="asas" class="form-control"
                                                        style="color: black;">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" style="color: black;">Nim</label>
                                                    <input type="text" name="nim" value="asasas" class="form-control"
                                                        style="color: black;">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" style="color: black;">Jurusan</label>
                                                    <select name="jurusan" class="form-control" selected="selected"
                                                        style="color: black;">
                                                        <option value="Sistem Komputer">
                                                            Sistem Komputer</option>
                                                        <option value="Sistem Informasi">
                                                            Sistem Informasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success"
                                                    name="btnUpdate">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form method="POST" action="">
                                            <div class="modal-body">
                                                <input type="text" hidden="true" name="id_kandidat" value="">
                                                <h3 style="color: black;">Yakin ingin menghapus data kandidat <center>
                                                        <strong>gg</strong></center>
                                                </h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger"
                                                    name="btnDelete">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="../input/kandidat.php"><button class="btn btn-success btn-sm float-right" type="button">Tambah Data
                    <i class="fa fa-plus"></i></button></a>
        </div>
    </div>
    <div class="card-body">

    </div>
</div>
@endsection
