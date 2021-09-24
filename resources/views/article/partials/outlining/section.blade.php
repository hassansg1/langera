<div class="row">
    <h3 class="font-size-20">Outlining
    </h3>
    <p style="color: #928CA6!important;" class="text-muted font-size-15">Outlining of my feature story</p>
    <div class="mt-3 col-lg-4">
        @foreach($article->sources as $source)
            <div style="cursor: pointer" onclick="" class="col-xl-12 col-sm-12">
                @include('article.partials.researching.item',['item' => $source])
            </div>
        @endforeach
    </div>
    <div class="mt-3 col-lg-8">
        <form action="{{  url('saveOutlining') }}" method="post" id="outlining_form" accept-charset="utf-8"
              enctype="multipart/form-data">
            @csrf
            <textarea name="outlining_text" id="outlining_text" style="width:95%;height: 900px">
                {!! $article->outlining !!}
            </textarea>
        </form>
    </div>
</div>
<br>
<div style="text-align: right">
<button type="button" onclick="exportOutlining()" class="btn btn-primary form_step_btn">PDF</button>
<button type="button" onclick="exportOutlining()" class="btn btn-primary form_step_btn">Word</button>
</div>
<br>
<button type="button" class="btn btn-default prev-step form_step_btn">Back</button>
<button type="button" class="btn btn-primary next-step form_step_btn">Next</button>
