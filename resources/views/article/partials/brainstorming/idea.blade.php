<div onclick="addIdeaToArticle('{{ $idea->id }}')" class="card bradius_20 p-6 pl-20">
    <div class="card-body">
        <div class="">
            <h4 class="one_line_break">
                {{ $idea->idea ?? '' }}
                <span
                    style="display: {{ isset($article) && $article->idea_id == $idea->id ? 'block' : 'none' }}"
                    class="float-end mt-1 article_check" id="article_check_{{ $idea->id }}"><i class="fas fa-check-circle icon_orange"></i></span>
            </h4>
        </div>
    </div>
</div>
