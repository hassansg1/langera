@extends('layouts.master')

@section('title') Create Article @endsection

@section('content')
    <style>
        .card-body {
            padding-left: 12px !important;
        }
    </style>
    <div class="row pl-27">
        <div class="col-xl-1 w-40">
            <span style="font-size: 22px;font-weight: 400;cursor:pointer;"
                  onclick="location.href='{{ url('myCourse/'.$article->id) }}'"><i
                    style="margin-top: 4px;color: #928BA6"
                    class="fas fa-angle-left"></i></span>
        </div>
        <div class="col-xl-11 pl-0">

            <h3>Add New article</h3>
            <br>
            @include('article.form')
        </div>

    </div>
@endsection

