@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show px-3 mb-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <h5 class="text-success"> <i class="mdi mdi-check-all me-2"></i>Successful</h5>
            <p>{{ Session::get('success') }}</p>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show px-3 mb-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <h5 class="text-danger"><i class="mdi mdi-block-helper me-2"></i>Unsuccessful</h5>
            <p>{{ Session::get('error') }}</p>
        </div>
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <h5 class="text-warning"><i class="mdi mdi-alert-outline me-2"></i>Tidak Unsuccessful</h5>
            <p>{{ Session::get('warning') }}</p>
        </div>
    </div>
@endif


<!-- SERVER SIDE VALIDATION ERROR MESSAGE DISPLAY -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show px-3 mb-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif