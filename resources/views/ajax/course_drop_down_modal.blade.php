<div class="modal-header">
    <h5 class="modal-title" id="myLargeModalLabel">Select Course(s)</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <label class="form-label">Courses</label>

        <select id="select_courses" name="select_courses[]" class="select2 form-control select2-multiple"
                multiple="multiple"
                data-placeholder="Choose ...">
            @foreach(\App\Models\Course::all() as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>

    </div>

    <div class="mt-3 d-grid">
        <button onclick="saveCourses()" class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="1"
                type="submit">
            Save
        </button>
    </div>
</div>
