@extends('Page.master')
@section('status', 'active')
@section('konten')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NIM</th>
                        <th scope="col">Ip Address</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="statusUser">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    getStatus();
    setInterval(getStatus, 1000);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getStatus() {
        $.ajax({
            type: 'POST',
            url: '/status',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                console.log(data);
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

        if (data.status === 1) {
            tmpData = "";
            for (i = 0; i < data.data.length; i++) {
                tmpData += "<tr><th>" + data.data[i].nim + "</th><td>" + data.data[i].ip_address +
                    "</td><td>" + data.data[i].status + "</td></tr>";
            }
            $(".statusUser").html(tmpData);
        } else {
            alert("Terjadi Kesalahan Pada Database..!!");
        }
    }

</script>
@endsection
