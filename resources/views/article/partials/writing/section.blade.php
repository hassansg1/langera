<div class="row">
    <h3 class="font-size-20">Writing
    </h3>
    <div class="mt-3 col-lg-4">
        @foreach($article->sources as $source)
            <div style="cursor: pointer" onclick="" class="col-xl-12 col-sm-12">
                @include('article.partials.researching.item',['item' => $source])
            </div>
        @endforeach
    </div>
    <div class="mt-3 col-lg-8">
        <form action="{{  url('writing') }}" method="post" id="writing_form" accept-charset="utf-8"
              enctype="multipart/form-data">
            @csrf
            <textarea name="writing_text" id="writing_text" style="width:95%;height: 900px">
                {!! $article->writing !!}
            </textarea>
        </form>
    </div>
</div>
<br>
<div style="text-align: right">
    <button type="button" onclick="pdfWriting()" class="btn btn-primary form_step_btn">PDF</button>
    <button type="button" onclick="exportOutlining()" class="btn btn-primary form_step_btn">Word</button>
</div>
<br>
<button type="button" class="btn btn-default prev-step form_step_btn">Back</button>
