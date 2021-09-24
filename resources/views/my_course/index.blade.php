@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Dashboard @endslot
    @endcomponent

    <div class="row pl-27">
        <div class="col-xl-1 w-40">
            <span style="font-size: 22px;font-weight: 400;cursor:pointer;"
                  onclick="location.href='{{ url('') }}'"><i style="margin-top: 4px;color: #928BA6"
                                                                       class="fas fa-angle-left"></i></span>
        </div>
        <div class="col-xl-11 pl-0">

            <h3>Feature Writing</h3>
            <br>
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item mycourse_navitem">
                    <a class="nav-link article_nav_link active" data-bs-toggle="tab" href="#articles" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">My Articles</span>
                    </a>
                </li>
                <li class="nav-item mycourse_navitem">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">My Flashcards</span>
                    </a>
                </li>
                <li class="nav-item mycourse_navitem">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <span class="d-none d-sm-block">My Resources</span>
                    </a>
                </li>
                <li class="nav-item mycourse_navitem">
                    <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">My Quick Links</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-4 text-muted pl-0 pr-0">
                <div class="tab-pane active" id="articles" role="tabpanel">
                    @include('my_course.articles.section')
                </div>
                <div class="tab-pane" id="profile1" role="tabpanel">
                    @include('my_course.flash_cards.section')

                </div>
                <div class="tab-pane" id="messages1" role="tabpanel">
                    @include('my_course.resources.section')

                </div>
                <div class="tab-pane" id="settings1" role="tabpanel">
                    @include('my_course.quick_links.section')
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    @include('my_course.articles.script')
@endsection
