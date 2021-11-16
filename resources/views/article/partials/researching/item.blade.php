<div class="card bradius_20 p-13">
    <div class="card-body">
        <div class="source_card_top">
            {{ $item->type }}
        </div>
        <br>
        <div class="one_line_break">
            <h4 title="{{ $item->title }}" class="font-weight-400 line_height_32">
                {{ $item->title }}
            </h4>
        </div>
        @if($item->link != "")
            <div class="one_line_break">
                <a href="{{ $item->link }}" target="_blank" class="font-weight-400 line_height_32 primary_color">
                    {{ $item->link }}
                </a>
            </div>
        @endif
        @if($item->document != "")
            <div class="one_line_break">
                <a href="{{ asset('assets/images/'.$item->document) }}" target="_blank"
                   class="font-weight-400 line_height_32 black_color">
                    {{ $item->document }}
                </a>
            </div>
        @endif
    </div>
</div>
