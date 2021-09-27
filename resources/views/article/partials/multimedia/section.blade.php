<div class="col-xl-12">
    <div class="popup-gallery d-flex flex-wrap">
        @foreach($article->files as $file)
            @if(strpos($file->full_file_path,'.mp4') !== false)
                <video width="200" controls>
                    <source src="{{ $file->full_file_path }}" type="video/mp4">
                    Your browser does not support HTML video.
                </video>
            @endif
            <a href="{{ $file->full_file_path }}" title="Image">
                <div class="img-fluid mr-5">
                    <img src="{{ $file->full_file_path }}" alt="" width="170">
                </div>
            </a>
        @endforeach
    </div>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div>
            <form action="{{ route('files.store') }}" method="post" class="dropzone" id="file_upload_form"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="filesable_type" value="{{ get_class($article) }}">
                <input type="hidden" name="filesable_id" value="{{ $article->id }}">
                <div class="fallback">
                    <input name="file" type="file" multiple="multiple">
                </div>
                <div class="dz-message needsclick">
                    <div class="mb-3">
                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                    </div>

                    <h4>Drop files here or click to upload.</h4>
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-default prev-step form_step_btn">Back</button>
<button type="button" class="btn btn-primary next-step form_step_btn">Next</button>
@section('script')
    <!-- Magnific Popup-->

    <script>
        Dropzone.options.fileDropzone = {
            url: '{{ route('files.store') }}',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            maxFilesize: 8,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function (file) {
                var name = file.upload.filename;
                {{--$.ajax({--}}
                {{--    type: 'POST',--}}
                {{--    url: '{{ route('file.remove') }}',--}}
                {{--    data: { "_token": "{{ csrf_token() }}", name: name},--}}
                {{--    success: function (data){--}}
                {{--        console.log("File has been successfully removed!!");--}}
                {{--    },--}}
                {{--    error: function(e) {--}}
                {{--        console.log(e);--}}
                {{--    }});--}}
                {{--var fileRef;--}}
                {{--return (fileRef = file.previewElement) != null ?--}}
                {{--    fileRef.parentNode.removeChild(file.previewElement) : void 0;--}}
            },
            success: function (file, response) {
                doSuccessToast(f);
                console.log(file);
            },
        }
    </script>

@endsection
