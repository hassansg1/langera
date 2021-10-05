<div class="row">
    <div class="col-xl-12">
        <div class="card overflow-hidden" style="padding-top: 11px">
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-6" style="padding-left: 36px">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="profile-user-wid mb-4">
                                    <img
                                        src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                                        alt="" class="img-thumbnail rounded-circle">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-3">
                                    <h4 class="">{{ Str::ucfirst(Auth::user()->name) }}</h4>
{{--                                    <p class="text-muted font-size-15 mb-0 ">Vancouver, BC</p>--}}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-3">
                                    <p class="text-muted font-size-15 mb-0 ">About me</p>
                                    <h4 class="">{{ currentUser()->about }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <div class="col-md-2 flash_card right_card">
                                <div style="border-left: 1px solid #DEE4EE" class="mt-3 mb-3">
                                    <h3 class="">{{getUserCourses()->count()}}</h3>
                                    <p class="text-muted mb-0 ">Articles</p>
                                </div>
                            </div>
                            <div class="col-md-2 flash_card left_card">
                                <div class="mt-3 mb-3">
                                    <h3 class="">{{getUserFlashCards()->count()}}</h3>
                                    <p class="text-muted mb-0 ">Flashcards</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
