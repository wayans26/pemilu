function successAlert(msg) {
    swal({
        position: '',
        type: 'success',
        title: msg,
        showConfirmButton: true,
        // timer: 20000
    }).then(function (result) {
        if (result.value) {
            // window.location = "../index.php";
        }
    })
}

function errorAlert(msg) {
    swal({
        type: 'error',
        title: 'Oops...',
        text: msg,
    })
}
