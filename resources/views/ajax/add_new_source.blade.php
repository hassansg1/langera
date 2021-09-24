<form id="add_source_form" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" value="{{ $articelId }}" name="article_id">
    <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Add a Source</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-4">
            <label class="form-label">Type of Source</label>

            <input type="text" class="form-control" value="adad" name="source_type" id="source_type" required>

        </div>

        <div class="mb-4">
            <label class="form-label">Title</label>

            <textarea class="form-control" name="source_title" id="source_title" rows="6">ada</textarea>

        </div>

        <div class="mb-4">
            <label class="form-label">Link</label>

            <input type="text" class="form-control" value="adad" name="source_link" id="source_link">

        </div>
        <div class="mb-4">
            <label class="form-label">Upload Document <span class=" text-muted">(Work, PDF, Audio)</span></label>
            <div class="input-group">
                <input type="file" name="source_file"  class="form-control" id="source_file">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary waves-effect waves-light form_step_btn" data-id="1"
                type="submit">
            Submit
        </button>
    </div>
</form>

<script>

    $(document).ready(function () { // Wait until document is fully parsed
        $("#add_source_form").on('submit', function (e) {
            let articleId = $('#article_id').val();
            var form = $("#add_source_form");
            var formData = new FormData(form[0]);
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route('source.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    $('#sources_area').append(result.html);
                    $('.modal').modal('hide');
                },
            });
        });
    })
</script>
