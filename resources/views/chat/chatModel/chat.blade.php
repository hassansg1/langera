<ul class="list-unstyled mb-0" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
        </div>
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                <div class="simplebar-content-wrapper"
                     style="height: auto; overflow: hidden scroll;">
                    <div class="simplebar-content" style="padding: 0px;">
{{--                        <li>--}}
{{--                            <div class="chat-day-title">--}}
{{--                                <span class="title">Today</span>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        @if($chat)

                            @php($unique= [])
                        @foreach($chat as $key => $value)
                            @if($to == $value->from || $to == $value->to)
                                @php($name = isset($value->userFrom->first_name)?$value->userFrom->firstst_name .' '.$value->userFrom->last_name:'')
                                    <li @if($value->from == loggedInUserId()) class="right" @endif>
                            <div class="conversation-list">
                                {{--                                                            <div class="dropdown">--}}

                                {{--                                                                <a class="dropdown-toggle" href="#" role="button"--}}
                                {{--                                                                   data-bs-toggle="dropdown" aria-haspopup="true"--}}
                                {{--                                                                   aria-expanded="false">--}}
                                {{--                                                                    <i class="bx bx-dots-vertical-rounded"></i>--}}
                                {{--                                                                </a>--}}
                                {{--                                                                <div class="dropdown-menu">--}}
                                {{--                                                                    <a class="dropdown-item" href="#">Copy</a>--}}
                                {{--                                                                    <a class="dropdown-item" href="#">Save</a>--}}
                                {{--                                                                    <a class="dropdown-item" href="#">Forward</a>--}}
                                {{--                                                                    <a class="dropdown-item" href="#">Delete</a>--}}
                                {{--                                                                </div>--}}
                                {{--                                                            </div>--}}
                                <div class="ctext-wrap">
                                    <div class="conversation-name">{{$name}} </div>
                                    <p>
                                        {{$value->message}}
                                    </p>
                                    <p class="chat-time mb-0"><i
                                            class="bx bx-time-five align-middle me-1"></i>
                                        {{date('Y-m-d H:i:s', strtotime($value->created_at))}}</p>
                                </div>

                            </div>
                        </li>
                                @endif
                            @endforeach
                            @endif


                    </div>
                </div>
            </div>
        </div>
        <div class="simplebar-placeholder" style="width: auto; height: 639px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar"
             style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
        <div class="simplebar-scrollbar"
             style="height: 369px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
    </div>
</ul>
