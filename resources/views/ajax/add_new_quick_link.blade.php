<form id="add_quick_link_form" method="POST" action="{{ route('quick_link.store') }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Add a Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-4">
            <label class="form-label">Title</label>

            <input type="text" class="form-control" name="title" id="title" required>

        </div>

        <div class="mb-4">
            <label class="form-label">Link</label>

            <input type="text" class="form-control" name="link" id="link" required>

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
        $("#add_quick_link_form").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route('quick_link.store') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'title': $('#title').val(),
                    'link': $('#link').val(),
                },
                success: function (result) {
                    $('#quick_link_area').append(result.html);
                    $('.modal').modal('hide');
                },
            });
        });
    })
</script>
