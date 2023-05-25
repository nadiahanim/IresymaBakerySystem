@extends('layouts.master')

@section('title')
@lang('Order List')
@endsection

@section('css')
    <!-- dragula css -->
    <link href="{{ URL::asset('/build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Order List @endslot
@endcomponent

<div class="row">
    <div class="card">

            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-bs-toggle="tab" href="#table" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Table View</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#kanban" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Kanban View</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="table" role="tabpanel">
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
                                                    <label class="col-form-label control-label">Order ID</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Customer Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Status</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Last Updated</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach($all_orders as $i => $data)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td>Order #{{ $data->id }}</td> 
                                            <td>{{ $data->customer->fullname }}</td>
                                            <td class="text-center">{{date('d/m/Y', strtotime($data->deli_date))}}</td>
                                            <td class="text-center">
                                                @if($data->order_status == 1)
                                                <span class="badge rounded-pill badge-soft-info font-size-14"
                                                    id="task-status">New</span>
                                                    
                                                @elseif($data->order_status == 2)
                                                <span class="badge rounded-pill badge-soft-warning font-size-14"
                                                    id="task-status">In Progress</span>

                                                @elseif($data->order_status == 3)
                                                <span class="badge rounded-pill badge-soft-success font-size-14"
                                                    id="task-status">Ready</span>
                                                    
                                                @elseif($data->order_status == 4)
                                                <span class="badge rounded-pill badge-soft-success font-size-14"
                                                    id="task-status">Completed</span>

                                                @else
                                                <span class="badge rounded-pill badge-soft-danger font-size-14"
                                                    id="task-status">Cancelled</span>

                                                @endif
                                            </td> 
                                            <td class="text-center">{{date('d/m/Y h:i a', strtotime($data->updated_on))}}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('order.edit', ['order_id'=>$data->id]) }}" class="btn btn-soft-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>                                                   
                                                </div>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="kanban" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Upcoming</h4>
                                    <div id="task-1">
                                        <div id="upcoming-task" class="pb-1 task-list">
                                        @foreach($new_orders as $i => $data)
                                            <div class="card task-box" id="uptask-1">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('order.edit', ['order_id'=>$data->id]) }}"
                                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->
                                                    <div class="float-end ml-2">

                                                        @if($data->order_status == 1)
                                                        <span class="badge rounded-pill badge-soft-info font-size-12"
                                                            id="task-status">New</span>
                                                            
                                                        @elseif($data->order_status == 2)
                                                        <span class="badge rounded-pill badge-soft-warning font-size-12"
                                                            id="task-status">In Progress</span>

                                                        @else
                                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                                            id="task-status">Ready</span>

                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                                id="task-name">Order #{{$data->id}}</a></h5>
                                                        <p class="text-muted mb-4">{{$data->customer->fullname}}</p>
                                                    </div>

                                                    <div class="text-end">
                                                        <h5 class="font-size-13 mb-1" id="task-budget">Delivery Date: {{date('d/m/Y', strtotime($data->deli_date))}}</h5>
                                                        <p class="mb-0 text-muted">Total: RM {{$data->total_price}}</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end task card -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">In Progress</h4>
                                    <div id="task-2">
                                        <div id="inprogress-task" class="pb-1 task-list">
                                        @foreach($in_progress_orders as $i => $data)
                                            <div class="card task-box" id="intask-1">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ route('order.edit', ['order_id'=>$data->id]) }}"
                                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->

                                                    <div class="float-end ml-2">
                                                        @if($data->order_status == 1)
                                                        <span class="badge rounded-pill badge-soft-info font-size-12"
                                                            id="task-status">New</span>
                                                            
                                                        @elseif($data->order_status == 2)
                                                        <span class="badge rounded-pill badge-soft-warning font-size-12"
                                                            id="task-status">In Progress</span>

                                                        @else
                                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                                            id="task-status">Ready</span>

                                                        @endif
                                                    </div>

                                                    <div>
                                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                            id="task-name">Order #{{$data->id}}</a></h5>
                                                        <p class="text-muted mb-4">{{$data->customer->fullname}}</p>
                                                    </div>

                                                    <div class="text-end">
                                                        <h5 class="font-size-13 mb-1" id="task-budget">Delivery Date: {{date('d/m/Y', strtotime($data->deli_date))}}</h5>
                                                        <p class="mb-0 text-muted">Total: RM {{$data->total_price}}</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end task card -->
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Completed</h4>
                                    <div id="task-3">
                                        <div id="complete-task" class="pb-1 task-list">
                                        @foreach($completed_orders as $i => $data)
                                            <div class="card task-box" id="cmptask-1">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ route('order.edit', ['order_id'=>$data->id]) }}"
                                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->

                                                    <div class="float-end ml-2">
                                                        @if($data->order_status == 1)
                                                        <span class="badge rounded-pill badge-soft-info font-size-12"
                                                            id="task-status">New</span>
                                                            
                                                        @elseif($data->order_status == 2)
                                                        <span class="badge rounded-pill badge-soft-warning font-size-12"
                                                            id="task-status">In Progress</span>

                                                        @else
                                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                                            id="task-status">Ready</span>

                                                        @endif
                                                    </div>

                                                    <div>
                                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                            id="task-name">Order #{{$data->id}}</a></h5>
                                                        <p class="text-muted mb-4">{{$data->customer->fullname}}</p>
                                                    </div>

                                                    <div class="text-end">
                                                        <h5 class="font-size-13 mb-1" id="task-budget">Delivery Date: {{date('d/m/Y', strtotime($data->deli_date))}}</h5>
                                                        <p class="mb-0 text-muted">Total: RM {{$data->total_price}}</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end task card -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>


    </div>
</div>

@endsection
@section('script')
    <!-- dragula plugins -->
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ URL::asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/task-kanban.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/task-form.init.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
     <!-- Responsive examples -->
     <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>
@endsection