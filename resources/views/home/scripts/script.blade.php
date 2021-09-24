<script>
    function showAddNewCoursePopup() {
        $.ajax({
            type: "GET",
            url: '{{ url('getCourses') }}',
            data: {},
            success: function (result) {
                showModal(centerModal, result.html);
                $('.select2').select2();
            },
        });
    }

    function saveCourses() {
        if($('#select_courses').val() != "")
        {
            $.ajax({
                type: "POST",
                url: '{{ url('saveUserCourses') }}',
                data: {courses: $('#select_courses').val(), '_token': '{{ csrf_token() }}'},
                success: function (result) {
                    location.reload();
                },
            });
        }
        else
            alert("Select at least one option...!!!");
    }
</script>
