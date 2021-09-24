<div class="row">
    <h3 class="font-size-20">My Articles
        <i class="bx bxs-plus-circle add_new_icon"
           onclick="location.href = '{{ route('article.createNew',$courseId) }}'"></i>
    </h3>

    <div style="cursor: pointer">
        <br>
        @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card bradius_20 p-13" onclick="location.href = '{{ route('article.show',$article->id) }}'">
                    <div class="card-body">
                        <div class="">
                            <h3 class="two_line_break">
                                {{ $article->name }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
