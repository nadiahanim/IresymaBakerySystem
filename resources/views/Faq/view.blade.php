@extends('layouts.master')

@section('title')
@lang('FAQ')
@endsection

@section('css')

@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Frequently Asked Questions @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($faq as $i => $data)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-{{$data->id}}">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$data->id}}" aria-expanded="true" aria-controls="flush-collapse-{{$data->id}}">
                                {{$data->question}}
                            </button>
                        </h2>
                        <div id="flush-collapse-{{$data->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{$data->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">{{$data->answer}}</div>
                        </div>
                    </div>
                    @endforeach                   
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')

@endsection