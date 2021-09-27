<ul class="list-unstyled mb-0 chat-conversation" data-simplebar="init" style="height: 500px;">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
        </div>
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                <div class="simplebar-content-wrapper"
                     style="height: auto; overflow: hidden scroll;">
                    <div class="simplebar-content" style="padding: 0px;">
                        @if($chat)
                            @foreach($chat as $key => $value)
                                    <li @if($value->from == loggedInUserId()) class="right" @endif>
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">{{isset($value->userFrom->first_name)?$value->userFrom->first_name:''}} {{isset($value->userFrom->last_name)?$value->userFrom->last_name:''}} </div>
                                                <p>
                                                    {{$value->message}}
                                                </p>
                                                <p class="chat-time mb-0"><i
                                                        class="bx bx-time-five align-middle me-1"></i>
                                                    {{date('Y-m-d H:i:s', strtotime($value->created_at))}}</p>
                                            </div>

                                        </div>
                                    </li>
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

