<script>
    function showAddFlashCards() {
        $.ajax({
            type: "GET",
            url: '{{ route('flash_card.create') }}',
            data: {},
            success: function (result) {
                showModal(centerModal, result.html);
            },
        });
    }
    function showAddQuickLink() {
        $.ajax({
            type: "GET",
            url: '{{ route('quick_link.create') }}',
            data: {},
            success: function (result) {
                showModal(centerModal, result.html);
            },
        });
    }
    function openToDoList() {
        $.ajax({
            type: "GET",
            url: '{{ route('to_do_list.create') }}',
            data: {},
            success: function (result) {
                showModal(centerModal, result.html);
            },
        });
    }
</script>
