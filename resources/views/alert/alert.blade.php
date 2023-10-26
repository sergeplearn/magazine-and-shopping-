@if(session('created'))
    <script>
        swal.fire({
            title: "Good job!",
            text: "Your Transaction was successful!",
            timer: 5000,
            timerProgressBar: true,
            icon: "success",
            showConfirmButton: false,
        });
    </script>
@endif


@if(session('empty'))
    <script>
        swal.fire({
            title: "oohh sorry nothing was found!",
            text: "nothing was found!",
            timer: 5000,
            timerProgressBar: true,
            icon: "error",
            showConfirmButton: false,
        });
    </script>
@endif


@if(session('deleted'))
    <script>
        swal.fire({
            title: "Good job!",
            text: "Your Transaction was successful!",
            timer: 5000,
            timerProgressBar: true,
            icon: "success",
            showConfirmButton: false,

        });
    </script>
@endif
