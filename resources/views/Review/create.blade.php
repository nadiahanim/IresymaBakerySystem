@extends('layouts.master')

@section('title')
@lang('Give A Review')
@endsection

@section('css')
<!-- Bootstrap Rating css -->
<link href="{{ URL::asset('build/libs/bootstrap-rating/bootstrap-rating.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') Give A Review @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('review.save') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <input name="order_id" type="hidden" class="form-control" id="order_id" value="{{ $order->id }}">

                <div class="row mb-2">
                    <label for="overall" class="col-md-2 col-form-label control-label">Overall</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="overall_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="design" class="col-md-2 col-form-label control-label">Design</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="design_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="taste" class="col-md-2 col-form-label control-label">Taste</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="taste_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="service" class="col-md-2 col-form-label control-label">Service</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="service_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="comment" class="col-md-2 col-form-label control-label">Comment</label>
                    <div class="col-md-8">                   
                        <textarea class="form-control" name="comment" rows="4"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a href="{{ route('order.view', ['order_id'=>$order->id]) }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- Bootstrap rating js -->
<script src="{{ URL::asset('build/libs/bootstrap-rating/bootstrap-rating.min.js') }}"></script>

<script src="{{ URL::asset('/build/js/pages/rating-init.js') }}"></script>
@component('components.alert')@endcomponent
@endsection