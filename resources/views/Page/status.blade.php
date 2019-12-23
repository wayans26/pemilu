@extends('Page.master')
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
                console.log("masuk");

            }
        });
    }

    function setStatus() {
        data = "";
        for (i = 0; i < 5; i++) {
            data += "<tr><th>1</th><td>Otto</td><td>@mdo</td></tr>";
        }
        $(".statusUser").html(data);
    }

</script>
@endsection
