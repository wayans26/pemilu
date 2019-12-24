@extends('Page.master')
@section('detailsuara', 'active')
@section('konten')
<div class="row">
    <div class="card">
        <div class="card-header">
            <center>Detail Suara Masuk</center>
        </div>
        <div class="card-body">
            <table class="table table-stripped" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilih</th>
                        <th>Nama Kandidat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suara as $key=>$item)
                    <tr>
                        <td>{{$suara->firstItem() + $key}}</td>
                        <td>{{$item->nama_pemilih}}</td>
                        <td>{{$item->nama_kandidat}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$suara->links()}}
        </div>
    </div>
</div>
@endsection
