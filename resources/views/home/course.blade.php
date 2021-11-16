<div style="cursor: pointer" onclick="location.href='{{ url('myCourse/'.$course->id) }}'" class="col-xl-4 col-sm-6">
    <div class="card bradius_20 p-13" style="background-color: #E5E4F8 !important;">
        <div class="card-body">
            <div class="course_card ">
                <img class="course_card_icon" src="{{ asset('assets/images/feature_writing.png') }}" alt="">
            </div>
            <br>
            <div class="">
                <h3>{{ $course->name ?? '' }}</h3>
            </div>
        </div>
    </div>
</div>
