<script>
    function showAddIdea() {
        $.ajax({
            type: "GET",
            url: '{{ route('idea.create') }}',
            data: {},
            success: function (result) {
                showModal(centerModal, result.html);
            },
        });
    }

    function addIdeaToArticle(id) {
        let articleId = $('#article_id').val();
        $.ajax({
            type: "POST",
            url: '{{ route('idea.add_to_article') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'article_id': articleId
            },
            success: function (result) {
                if (result.status) {
                    $('#article_id').val(result.article_id);
                    $('.article_check').hide();
                    $('#article_check_' + id).show();
                }
            },
        });
    }

    function showAddSource() {
        let articleId = $('#article_id').val();
        $.ajax({
            type: "GET",
            url: '{{ route('source.create') }}',
            data: {articleId: articleId},
            success: function (result) {
                showModal(centerModal, result.html);
            },
        });
    }

    function exportOutlining()
    {
        let articleId = $('#article_id').val();
        $.ajax({
            type: "POST",
            url: '{{ url('pdfOutlining') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'article_id': articleId
            },
            success: function (result) {
            },
        });
    }
    function exportOutliningWord()
    {
        let articleId = $('#article_id').val();
        $.ajax({
            type: "POST",
            url: '{{ url('wordOutlining') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'article_id': articleId
            },
            success: function (result) {
            },
        });
    }
    function pdfWriting()
    {
        let articleId = $('#article_id').val();
        $.ajax({
            type: "POST",
            url: '{{ url('pdfWriting') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'article_id': articleId
            },
            success: function (result) {
            },
        });
    }

    function addIdeaToArticle(id) {
        let articleId = $('#article_id').val();
        $.ajax({
            type: "POST",
            url: '{{ route('source.add_to_article') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'article_id': articleId
            },
            success: function (result) {
                if (result.status) {
                    $('#article_id').val(result.article_id);
                    $('.article_check').hide();
                    $('#article_check_' + id).show();
                }
            },
        });
    }
</script>
