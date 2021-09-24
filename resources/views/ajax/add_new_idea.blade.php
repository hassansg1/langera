<form id="add_idea_form" method="POST"  action="{{ route('idea.store') }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Add new Idea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-4">
            <label class="form-label">Idea</label>

            <input type="text" class="form-control" name="idea" id="idea_field" required>

        </div>

        <div class="mb-4">
            <label class="form-label">Notes</label>

            <textarea class="form-control" name="notes" id="notes_filed" rows="6"></textarea>

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
        $("#add_idea_form").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route('idea.store') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'idea': $('#idea_field').val(),
                    'notes': $('#notes_filed').val(),
                },
                success: function (result) {
                    $('#ideas_area').append(result.html);
                    $('.modal').modal('hide');
                },
            });
        });
    })
</script>
