@if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: "{{ Session::get('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Unsuccessful',
            text: "{{ Session::get('error') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif