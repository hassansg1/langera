<input type="hidden" id="article_id" value="{{ $article->id ?? '' }}">
<div class="row d-flex">
    <div class="wizard">
        <div class="col-md-12">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                @include('article.partials.tabs')
            </div>
        </div>
        <hr>
        <div class="tab-content p-3 text-muted pl-0 pr-0" id="main_form">
            <div class="tab-pane article_tabs active" role="tabpanel" id="step1">
                @include('article.partials.brainstorming.section')
            </div>
            <div class="tab-pane article_tabs" role="tabpanel" id="step2">
                @include('article.partials.researching.section')
            </div>
            <div class="tab-pane article_tabs" role="tabpanel" id="step3">
                @include('article.partials.multimedia.section')
            </div>
            <div class="tab-pane article_tabs" role="tabpanel" id="step4">
                @include('article.partials.outlining.section')
            </div>
            <div class="tab-pane article_tabs" role="tabpanel" id="step5">
                @include('article.partials.writing.section')
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@section('script')
    @include('article.script')
@endsection
