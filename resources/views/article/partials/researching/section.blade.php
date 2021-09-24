<div class="row">
    <h3 class="font-size-20">Researching
        <i class="bx bxs-plus-circle add_new_icon" onclick="showAddSource()"></i>
    </h3>
    <p style="color: #928CA6!important;" class="text-muted font-size-15">Add your sources</p>
    <div class="row mt-3">
        @foreach($article->sources as $source)
            <div style="cursor: pointer" onclick="" class="col-xl-4 col-sm-6">
                @include('article.partials.researching.item',['item' => $source])
            </div>
        @endforeach
    </div>
</div>
<button type="button" class="btn btn-default prev-step form_step_btn">Back</button>
<button type="button" class="btn btn-primary next-step form_step_btn">Next</button>
@section('script')
    @include('article.partials.researching.script')
@endsection
