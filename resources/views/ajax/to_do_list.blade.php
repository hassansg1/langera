<div class="modal-header">
    <h5 class="modal-title" id="myLargeModalLabel">To Do List</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-4" id="to_do_list_area">
        @foreach(\Illuminate\Support\Facades\Auth::user()->toDoList as $toDo)
            @include('ajax.to_do_list_item',['item' => $toDo])
        @endforeach
    </div>
    <div class="mb-4">
        <input type="text" value="" class="form-control" placeholder="Type and press enter to create new"
               id="new_to_do_list">
    </div>
</div>

<script>

    function handleToDoClick(cb, id) {
        $.ajax({
            type: "POST",
            url: '{{ route('to_do_list.toggleCheckValue') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                value: cb.checked,
                id: id
            },
            success: function (result) {
            },
        });
    }

    $('#new_to_do_list').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $.ajax({
                type: "POST",
                url: '{{ route('to_do_list.store') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'title': $('#new_to_do_list').val(),
                },
                success: function (result) {
                    $('#to_do_list_area').append(result.html);
                    $('#new_to_do_list').val('');
                },
            });
        }
    });

</script>
