@extends('Page.master')
@section('dashboard', 'active')
@section('konten')
<div class="row">
    @foreach ($kandidat as $key=>$item)
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <center>
                    <h1></h1>
                </center>
            </div>
            <div class="card-body">
                <center><a href="#" data-toggle="modal" data-target="#vote{{$item->nim}}"><img
                            src="{{$item->photo}}"></a></center>
            </div>
            <div class="card-footer">
                <center>
                    <h3>{{$item->nama_lengkap}}</h3>
                </center>
                <button type="button" class="btn btn-default btn-lg col-md-12" data-toggle="modal"
                    data-target="#visimisi{{$item->nim}}">Visi & Misi</button>
            </div>
        </div>
    </div>

    <!-- Modal Vote -->
    <div class="modal fade" id="vote{{$item->nim}}" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br>
                    <!-- <h4 class="modal-title">Vote Kandidat</h4> -->
                </div>
                <form method="POST" action="/vote">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="text" name="nim" value="{{$item->nim}}" hidden="true">
                        <h3 style="color: black;">Yakin ingin memilih <strong>
                            </strong> ?</h3>
                        <h3 style="color: black;"><strong>Administrator </strong>tidak dapat melakukan
                            voting</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="btnVote">Vote</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Visi Misi -->
    <div class="modal fade" id="visimisi{{$item->nim}}" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br>
                    <!-- <h4 class="modal-title">Vote Kandidat</h4> -->
                </div>
                <div class="modal-body">
                    <strong class="h2" style="color: black;">Visi</strong>
                    <p>{{$item->visi}}</p><br>
                    <strong class="h2" style="color: black;">Misi</strong>
                    <p>{{$item->misi}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection