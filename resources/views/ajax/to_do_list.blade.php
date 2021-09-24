<form id="add_flash_card_form" method="POST" action="{{ route('flash_card.store') }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">To Do List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-4">
            <div class="form-check form-check-primary mb-3">
                <input class="form-check-input" type="checkbox" id="formCheckcolor1" checked="">
                <label class="form-check-label" for="formCheckcolor1">
                    Call For Interview
                </label>
            </div>

        </div>
    </div>
</form>

<script>

    $(document).ready(function () { // Wait until document is fully parsed
        $("#add_flash_card_form").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route('flash_card.store') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'topic': $('#topic_field').val(),
                    'answer': $('#answer_filed').val(),
                },
                success: function (result) {
                    $('#flash_area').append(result.html);
                    $('.modal').modal('hide');
                },
            });
        });
    })
</script>
