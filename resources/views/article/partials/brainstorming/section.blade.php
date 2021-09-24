<div class="row">
    <h3 class="font-size-20">Brainstorming
        <i class="bx bxs-plus-circle add_new_icon" onclick="showAddIdea()"></i>
    </h3>
    <p style="color: #928CA6!important;" class="text-muted font-size-15">Select an idea for your article</p>
    <div style="cursor: pointer"class="col-xl-6 col-sm-6" id="sources_area">
        <br>
        @foreach(\Illuminate\Support\Facades\Auth::user()->ideas as $idea)
            @include('article.partials.brainstorming.idea',['idea' => $idea])
        @endforeach
    </div>
</div>
<button type="button" class="btn btn-primary next-step form_step_btn">Next</button>
@section('script')
    @include('article.partials.brainstorming.script')
@endsection
