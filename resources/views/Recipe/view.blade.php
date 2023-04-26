@extends('layouts.master')

@section('title')
@lang('View Recipe')
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') View Recipe @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

                <input name="recipe_id" type="hidden" class="form-control" id="recipe_id" value="{{ $recipe->id }}">

                <div class="row mb-2">
                    <label for="title" class="col-md-2 col-form-label control-label">Title</label>
                    <div class="col-md-10">
                        <input name="title" type="text" class="form-control" id="title" value="{{ $recipe->title }}" readonly>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                    <div class="col-md-10">                   
                        <textarea id="elm1" name="description">{{ $recipe->body }}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <a href="{{ route('recipe.edit', ['recipe_id' => $recipe->id]) }}" class="btn btn-primary float-end me-2">Edit</a>
                        <a href="{{ route('recipe.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<!-- form advanced init -->
<script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script>
<!--tinymce js-->
<script src="build/libs/tinymce/tinymce.min.js"></script>
<!-- init js -->
<script src="build/js/pages/form-editor.init.js"></script>
@endsection