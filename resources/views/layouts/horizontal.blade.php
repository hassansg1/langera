<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="padding-top: 10px">
                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('/images/logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('/images/logo.png') }}" alt="" height="57">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <button onclick="location.href='{{ url('') }}'" type="button"
                    class="btn btn-sm px-3 font-size-23 header-item waves-effect waves-light" data-bs-toggle="collapse"
                    data-bs-target="#topnav-menu-content">
                <i class="bx bx-home-alt"></i>
            </button>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm px-3 font-size-23 header-item waves-effect waves-light"
                        id="page-header-grid-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-grid-alt"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-start">
                    <!-- item-->
                    @foreach(getUserCourses() as $course)
                        <a class="dropdown-item d-block"
                           href="{{ url('myCourse/'.$course->id) }}">{{ $course->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex">


            <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm px-3 font-size-23 header-item waves-effect waves-light"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    data-bs-target="#topnav-menu-content">
                <i class="bx bx-pencil"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item d-block" href="#" data-bs-toggle="modal" data-bs-target=".update-profile"> <span
                        key="t-profile"><strong>@lang('translation.Articles')</strong></span>
                </a>
                @foreach(getUserCourses() as $course)
                    <li><a class="dropdown-item d-block"
                       href="{{ url('myCourse/'.$course->id) }}">{{ $course->name }}</a></li>
                @endforeach
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal"
                   data-bs-target=".change-password">
                        <span key="t-settings"><strong>@lang('translation.FlashCard')</strong></span></a>
            </div>
            </div>
            <button onclick="location.href='{{ route('chat.index') }}'" style="font-size: 24px !important;"
                    type="button" class="btn btn-sm px-3 font-size-23 header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="far fa-comment-dots"></i>
            </button>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-user"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal" data-bs-target=".update-profile"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i> <span
                                key="t-profile">@lang('translation.Profile')</span></a>
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal"
                       data-bs-target=".change-password"><i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                        <span key="t-settings">@lang('translation.Settings')</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                key="t-logout">@lang('translation.Logout')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="modal fade change-password" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="change-password" action="{{route('updatePassword',[loggedInUserId()])}}">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password </label>
                        <input id="current-password" type="password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               name="current_password" autocomplete="current_password"
                               placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword"
                                data-id="{{ Auth::user()->id }}"
                                type="submit">Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update-profile" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="change-password" action="{{route('updateProfile',[loggedInUserId()])}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password">First name </label>
                        <input id="first_name" type="text"
                               class="form-control @error('first_name') is-invalid @enderror"
                               name="first_name"
                               required value="{{ currentUser()->first_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="current_password">Last Name </label>
                        <input id="first_name" type="text"
                               class="form-control @error('last_name') is-invalid @enderror"
                               name="last_name"
                               required value="{{ currentUser()->last_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="current_password">Email </label>
                        <input id="email" type="email"
                               class="form-control @error('last_name') is-invalid @enderror"
                               name="email"
                               required value="{{ currentUser()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="current_password">About </label>
                        <input id="about" type="text"
                               class="form-control @error('about') is-invalid @enderror"
                               name="about"
                               required value="{{ currentUser()->about }}">
                    </div>
                    <div class="mb-3">
                        <label for="current_password">Profile Picture </label>
                        <input id="avatar" type="file"
                               class="form-control @error('avatar') is-invalid @enderror"
                               name="avatar"
                               value="{{ currentUser()->avatar }}">
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword"
                                data-id="{{ Auth::user()->id }}"
                                type="submit">Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
