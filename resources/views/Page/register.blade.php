@extends('Page.master')
@section('konten')
@if (Session::has('status-tambah-berhasil'))
<script>
    successAlert("{!! Session::get('status-tambah-berhasil') !!}");
</script>
@elseif(Session::has('status-tambah-gagal'))
<script>
    errorAlert("{!! Session::get('status-tambah-gagal') !!}");
</script>
@endif
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Registrasi Peserta</h4>
            </div>
            <form action="/register" method="post">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label" style="color: blueviolet;font-size: 16pt;">Nim</label>
                        <input type="text" name="nim" class="form-control" style="color: white;" placeholder="NIM"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" style="color: blueviolet;font-size: 16pt;">Nama</label>
                        <input type="text" name="nama" class="form-control" style="color: white;" placeholder="Nama"
                            autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success" style="float: right;"
                        name="btnVote">Registrasi</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endsection
