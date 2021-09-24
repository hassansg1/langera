<div class="row mt-5">
    @foreach(getUserCourses() as $course)
        @include('home.course',['course' => $course])
    @endforeach

    <div class="col-xl-4 col-sm-6">
        <div class="card bradius_20 p-13" style="background-color: #f7f9fb !important;">
            <div class="card-body">
                <a onclick="showAddNewCoursePopup()" style="color: #f15925" href="javascript:void(0)"><i
                        class="bx bx-plus" style="font-size: 28px">Add course</i></a>
            </div>
        </div>
    </div>

</div>
@section('script')
@include('home.scripts.script')
@endsection
