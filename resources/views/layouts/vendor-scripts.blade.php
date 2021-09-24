<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
</script>

@yield('script')
<script>
    $(document).ready(function () {
        let editor1 = CKEDITOR.replace('outlining_text', {
            width: '100%',
            height: 900,
        });
        let editor2 = CKEDITOR.replace('writing_text', {
            width: '100%',
            height: 900,
        });

        editor1.on('change', function () {
            console.log(CKEDITOR.instances.outlining_text.getData());
            $.ajax({
                type: "POST",
                url: '{{ url('saveOutlining') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'outlining': CKEDITOR.instances.outlining_text.getData(),
                    'article_id': $('#article_id').val()
                },
                success: function (result) {
                    // if (result.status) {
                    //     $('#article_id').val(result.article_id);
                    //     $('.article_check').hide();
                    //     $('#article_check_' + id).show();
                    // }
                },
            });
        });
        editor2.on('change', function () {
            console.log(CKEDITOR.instances.writing_text.getData());
            $.ajax({
                type: "POST",
                url: '{{ url('saveWriting') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'writing': CKEDITOR.instances.writing_text.getData(),
                    'article_id': $('#article_id').val()
                },
                success: function (result) {
                    // if (result.status) {
                    //     $('#article_id').val(result.article_id);
                    //     $('.article_check').hide();
                    //     $('#article_check_' + id).show();
                    // }
                },
            });
        });

        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

            var target = $(e.target);

            if (target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {
            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);

        });
        $(".prev-step").click(function (e) {
            var active = $('.wizard .nav-tabs li.active');
            active.prev().removeClass('disabled');
            prevTab(active);

        });
    });

    function nextTab(elem) {
        let elm = $(elem).next().find('a[data-toggle="tab"]');
        showTab(elm, $(elem).next());
    }

    function showTab(elm, elem) {
        let nextTab = $(elm).attr('data-next');
        $('.article_tabs').hide();
        $('#' + nextTab).show();
        $('.nav-tabs li.active').removeClass('active');
        $(elem).addClass('active');
    }

    function prevTab(elem) {

        let elm = $(elem).prev().find('a[data-toggle="tab"]');
        showTab(elm, $(elem).prev());

    }

</script>

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>
@include('layouts.master_scripts')
@yield('script-bottom')
