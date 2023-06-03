@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('css')
    <link href="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent

@if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1)
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body bg-soft bg-info">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Completed Orders</p>
                                <h4 class="mb-0">{{ $total_order }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-info">
                                    <span class="avatar-title bg-info">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body bg-soft bg-success">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Total Sales</p>
                                <h4 class="mb-0">RM {{ $revenue }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="bx bx-money font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body bg-soft bg-danger">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">5 Star Reviews</p>
                                <h4 class="mb-0">{{ $five_star->count() }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-danger">
                                        <i class="bx bx-heart font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body">
                <p class="text-muted fw-medium">Product List</p>
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
                                <th class="text-center" width="25%">
                                    <div class="form-group">
                                        <label class="col-form-label control-label">Quantity</label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="field_wrapper_product_list">
                            @foreach($products as $i => $data)
                            <tr>
                                <th class="text-center" >{{ $loop->iteration }}</th>
                                <td>{{ $data->product_name }}</td> 
                                <td>
                                    <form>
                                    {{ csrf_field() }} 
                                        <input type="hidden" id="product_id_{{ $i }}" name="product_id" value="{{$data->id}}">
                                        <input data-toggle="touchspin" type="text" id="quantity_{{ $i }}" name="quantity" class="form-control" value="{{ $data->quantity }}" style="text-align: center;" onchange="updateQuantity({{$i}})">
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
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Order Overview</h4>
                <input name="orders" type="hidden" class="form-control" id="orders" data-piechart="{{ json_encode(array_column($pieChartData, 'y')) }}">
                <input name="label_orders" type="hidden" class="form-control" id="label_orders" data-label="{{ json_encode(array_column($pieChartData, 'x')) }}">
                <div id="pie_chart_order" data-colors='["--bs-success","--bs-primary", "--bs-danger","--bs-info", "--bs-warning"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ratings Overview</h4>
                <input name="reviews" type="hidden" class="form-control" id="reviews" data-donutchart="{{ json_encode(array_column($donutChartData, 'y')) }}">
                <input name="label_reviews" type="hidden" class="form-control" id="label_reviews" data-label="{{ json_encode(array_column($donutChartData, 'x')) }}">
                <div id="donut_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger","--bs-info", "--bs-warning", "--bs-secondary"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Sales Overview</h4>
                <input name="sales" type="hidden" class="form-control" id="sales" data-linechart="{{ json_encode(array_column($lineChartData, 'x')) }}">
                <div id="line_chart_datalabel" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
        <!--end card-->
    </div>
</div>
@else
@endif


@endsection
@section('script')

<script src="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script>
    $("input[name='quantity']").TouchSpin({
        min: 0,
        max: 600,
        step: 1,
    });
</script>

<!-- Required datatable js -->
<script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('/build/js/pages/HomeAdmin/chart.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/HomeAdmin/product.js') }}"></script>
@endsection