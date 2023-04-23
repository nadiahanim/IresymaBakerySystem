@extends('layouts.master')

@section('title')
@lang('Pricing')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Pricing @endslot
@endcomponent

<div class="row">
    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="{{ route('service.create')  }}" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New Price</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#shape" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[0]->name}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#flavour" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[1]->name}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#cream" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[2]->name}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#size" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[3]->name}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tier" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[4]->name}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#decorations" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[5]->name}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#delivery" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">{{$categories[6]->name}}</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <!-- START SHAPE -->
                <div class="tab-pane active" id="shape" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-shape" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_1 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SHAPE -->

                <!-- START CAKE FLAVOUR -->
                <div class="tab-pane" id="flavour" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-flavour" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_2 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CAKE FLAVOUR -->

                <!-- START CREAM FLAVOUR -->
                <div class="tab-pane" id="cream" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-cream" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_3 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CREAM FLAVOUR -->

                <!-- START CAKE SIZE -->
                <div class="tab-pane" id="size" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-size" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_4 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CAKE SIZE -->

                <!-- START TIER NO -->
                <div class="tab-pane" id="tier" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-tier" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_5 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TIER NO -->

                <!-- START DECORATIONS -->
                <div class="tab-pane" id="decorations" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-deco" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_6 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DECORATIONS -->

                <!-- START DELIVERY AREA -->
                <div class="tab-pane" id="delivery" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-delivery" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($service_6 as $i => $data)
                                        <tr>
                                            <th class="text-center" >{{ $loop->iteration }}</th>
                                            <td>{{ $data->name }}</td> 
                                            <td>{{ $data->price }}</td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('service.edit', ['service_id' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="{{ route('service.delete') }}">
                                                    {{ csrf_field() }} 
                                                    {{ method_field('DELETE') }}
                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="{{ $data->id }}">
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DELIVERY AREA -->

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>
@endsection