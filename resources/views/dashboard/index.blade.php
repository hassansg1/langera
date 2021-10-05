@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection
<style>
    .card-body {
        padding-left: 12px !important;
    }
</style>
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Dashboard @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card welcom_grid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" style="padding: 42px">
                                <h1 class="text_white family_font font-size-24 font-size-54">Welcome {{ \Illuminate\Support\Facades\Auth::user()->first_name }},</h1>
                                <p class="text_white ml-6 font-size-16">{{ date('Y-m-d') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.courses')
@endsection
