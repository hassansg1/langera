<div class="row">
    <h3 class="font-size-20">My Quick Links
        <i class="bx bxs-plus-circle add_new_icon"
           onclick="showAddQuickLink()"
        ></i>
    </h3>
    <div class="row" id="quick_link_area" style="cursor: pointer">
        @foreach(\Illuminate\Support\Facades\Auth::user()->quickLinks as $item)
            @include('my_course.quick_links.item',['item' => $item])
        @endforeach
    </div>
</div>
