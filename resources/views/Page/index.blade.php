@extends('Page.master')
@section('konten')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <center>
                    <h1></h1>
                </center>
            </div>
            <div class="card-body">
                <center><a href="#" data-toggle="modal" data-target="#vote"><img
                            src="assets/img/anime3.png"></a></center>
            </div>
            <div class="card-footer">
                <center>
                    <h3>aaa</h3>
                </center>
                <button type="button" class="btn btn-default btn-lg col-md-12" data-toggle="modal"
                    data-target="#visimisi">Visi & Misi</button>
            </div>
        </div>
    </div>
    <!-- Modal Vote -->
    <div class="modal fade" id="vote" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br>
                    <!-- <h4 class="modal-title">Vote Kandidat</h4> -->
                </div>
                <form method="GET" action="inc/vote.php">
                    <div class="modal-body">
                        <input type="text" name="id_kandidat" value="" hidden="true">
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
    <div class="modal fade" id="visimisi" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Vote Kandidat</h4> -->
                </div>
                <div class="modal-body">
                    <strong class="h2" style="color: black;">Visi</strong>
                    <p>asasasasas</p><br>
                    <strong class="h2" style="color: black;">Misi</strong>
                    <p>asasasas</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection