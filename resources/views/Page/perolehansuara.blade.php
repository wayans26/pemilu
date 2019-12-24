@extends('Page.master')
@section('perolehansuara', 'active')
@section('konten')
<div class="row">
    <div class="card">
        <div class="card-header">
            <center>Perolehan Suara</center>
        </div>
        <div class="card-body">
            <canvas id="myChart" style="max-height: 70vh;max-width: 100vw;"></canvas>
        </div>
    </div>
</div>

<script>
    getStatus();
    setInterval(getStatus, 1000 * 10);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getStatus() {
        $.ajax({
            type: 'POST',
            url: '/perolehansuara/get',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                // console.log(data);
                setStatus($.parseJSON(data))

            },
            error: function (data) {
                console.log(data);
                getStatus();
            }
        });
    }

    function setStatus(data) {
        console.log(data);
        var nama_kandidat = [];
        var totalSuara = [];

        for (i = 0; i < data.length; i++) {
            nama_kandidat.push(data[i].nama_lengkap);
            totalSuara.push(data[i].totalsuara);
        }
        var chartdata = {
            labels: nama_kandidat,
            datasets: [{
                label: 'Nama Kandidat',
                backgroundColor: 'rgba(202, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data: totalSuara
            }]
        };

        var ctx = $("#myChart");

        var barGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata,
            labels: ['Red', 'Blue', 'Purple', 'Yellow']
        });


    }

</script>
@endsection
