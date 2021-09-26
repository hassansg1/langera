@if($chats)
    @php($unique= [])
    @foreach($chats as $chat)
        @if($chat->from != loggedInUserId() )
            @php($name = $chat->userFrom->first_name. ' ' .$chat->userFrom->last_name)
            @php($avatar = isset($chat->userFrom->avatar)?$chat->userFrom->avatar:asset('/assets/images/users/avatar-1.jpg')  )
            @php($id = $chat->from)
        @else
            @php($name = isset($chat->userTo->first_name)?$chat->userTo->first_name.' ' .$chat->userTo->last_name: '')
            @php($avatar = isset($chat->userTo->avatar)?$chat->userTo->avatar: asset('/assets/images/users/avatar-1.jpg') )
            @php($id = $chat->to)
        @endif
        @if(in_array($name,$unique) == false)
            <li class="active"  onclick="openInChatBox('{{$id}}','{{$name}}')" >
                <a href="javascript: void(0);">
                    <div class="d-flex">
                        l                                    <div
                            class="flex-shrink-0 align-self-center me-3">
                            <i class="mdi mdi-circle font-size-10"></i>
                        </div>
                        <div
                            class="flex-shrink-0 align-self-center me-3">
                            <img src="{{$avatar}}"
                                 class="rounded-circle avatar-xs"
                                 alt="">
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-14 mb-1">
                                {{$name}}
                            </h5>
                            <p class="text-truncate mb-0">Hey! there I'm
                                available</p>
                        </div>
                        {{--                                                                        <div class="font-size-11">05 min</div>--}}
                    </div>
                </a>
            </li>
            @php(array_push($unique, $name))
        @endif
    @endforeach
@endif
