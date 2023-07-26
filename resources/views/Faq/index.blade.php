@extends('layouts.master')

@section('title')
@lang('FAQ')
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

@component('components.breadcrumb')
@slot('title') FAQ @endslot
@endcomponent

<div class="row">
    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="{{ route('faq.create')  }}" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
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
                                            <label class="col-form-label control-label">Question</label>
                                        </div>
                                    </th>
                                    <th class="text-center" width="15%">
                                        <div class="form-group">                                          
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="field_wrapper">
                                @foreach($faq as $i => $data)
                                <tr>
                                    <th class="text-center" >{{ $loop->iteration }}</th>
                                    <td>{{ $data->question }}</td> 
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('faq.edit', ['faq_id' => $data->id]) }}" class="btn btn-soft-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>
                                            <a class='btn btn-soft-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                        </div>
                                        <form id="delete-form" method="POST" action="{{ route('faq.delete') }}">
                                            {{ csrf_field() }} 
                                            {{ method_field('DELETE') }}
                                            <input name="faq_id" type="hidden" class="form-control" id="faq_id" value="{{ $data->id }}">
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
</div>
<!-- end row -->

@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>
    @component('components.alert')@endcomponent
@endsection