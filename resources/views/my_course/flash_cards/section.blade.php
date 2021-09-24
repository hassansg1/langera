<div class="row">
    <h3 class="font-size-20">My Flashcards
        <i class="bx bxs-plus-circle add_new_icon"
           onclick="showAddFlashCards()"
        ></i>
    </h3>
    <div class="row" id="flash_area" style="cursor: pointer">
        @foreach(\Illuminate\Support\Facades\Auth::user()->flashCards as $item)
            @include('my_course.flash_cards.item',['item' => $item])
        @endforeach
    </div>
</div>
