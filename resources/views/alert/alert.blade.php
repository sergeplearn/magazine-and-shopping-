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

@if(session('taken'))
    <script>
        swal.fire({
            title: "Already Taken!",
            text: "sorry that time and date was already taken please!",
            timer: 9000,
            timerProgressBar: true,
            icon: "info",
            showConfirmButton: false,

        });


    </script>
@endif
