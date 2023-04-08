@extends('layouts.master')

@section('title')
@lang('Cake Catalogue')
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Our Sample Cakes @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')

@endsection