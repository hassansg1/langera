<div style="cursor: pointer" onclick="" class="col-xl-4 col-sm-6">
    <div class="card bradius_20 p-13">
        <div class="card-body">
            <div class="source_card_top">
                {{ $item->type }}
            </div>
            <br>
            <div class="two_line_break">
                <h4 class="font-weight-400 line_height_32">
                    {{ $item->title }}
                </h4>
            </div>
            <div class="one_line_break">
                <a href="{{ $item->link }}" class="font-weight-400 line_height_32">
                    {{ $item->link }}
                </a>
            </div>
        </div>
    </div>
</div>
