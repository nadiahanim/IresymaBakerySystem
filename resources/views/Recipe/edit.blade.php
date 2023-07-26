@extends('layouts.master')

@section('title')
@lang('Edit Recipe')
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') Edit Recipe @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('recipe.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                @method('PATCH')

                <input name="recipe_id" type="hidden" class="form-control" id="recipe_id" value="{{ $recipe->id }}">

                <div class="row mb-2">
                    <label for="title" class="col-md-2 col-form-label control-label">Title</label>
                    <div class="col-md-10">
                        <input name="title" type="text" class="form-control" id="title" value="{{ $recipe->title }}"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.recipe.title.required') }}" data-parsley-trigger="keyup">
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
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a class="btn btn-danger float-end me-2 swal-delete">@lang('button.delete')</a>
                        <a href="{{ route('recipe.view', ['recipe_id' => $recipe->id]) }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

            </form>

            <form id="delete-form" method="POST" action="{{ route('recipe.delete') }}">
                {{ csrf_field() }} 
                {{ method_field('DELETE') }}
                <input name="recipe_id" type="hidden" class="form-control" id="recipe_id" value="{{ $recipe->id }}">
            </form>


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
@component('components.alert')@endcomponent
@endsection