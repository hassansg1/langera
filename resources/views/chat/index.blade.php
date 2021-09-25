@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Dashboard @endslot
    @endcomponent

    <div class="row pl-27">
        <div class="d-lg-flex">
            <div class="chat-leftsidebar me-lg-4">
                <div class="">
                    <div class="py-4 border-bottom">
                        <div class="d-flex">
                            <div class="flex-shrink-0 align-self-center me-3">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}" class="avatar-xs rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                                <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle me-1"></i>
                                    Active</p>
                            </div>

                            <div>
                                <div class="dropdown chat-noti-dropdown active">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @if($users)
                                            @foreach($users as $key => $user)
                                                @if($user->id != loggedInUserId())
                                                <a  onclick="openInChatBox('{{$user->id}}','{{$user->first_name}}'+' '+'{{$user->last_name}}')" class="dropdown-item">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <img src="  {{ isset($user->avatar) ? asset($user->avatar) : asset('/assets/images/users/avatar-1.jpg') }}" class="avatar-xs rounded-circle" alt="">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-15 mb-1">{{$user->first_name}} {{$user->last_name}}</h5>
                                                </div>
                                                </a>
                                                @endif
                                            @endforeach
                                            @endif
{{--                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Something else here</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="search-box chat-search-box py-4">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="bx bx-search-alt search-icon"></i>
                        </div>
                    </div>

                    <div class="chat-leftsidebar-nav">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                    <span class="d-none d-sm-block">Chat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#groups" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="bx bx-group font-size-20 d-sm-none"></i>
                                    <span class="d-none d-sm-block">Groups</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contacts" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                    <span class="d-none d-sm-block">Contacts</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-4">
                            <div class="tab-pane show active" id="chat">
                                <div>
                                    <h5 class="font-size-14 mb-3">Recent</h5>
                                    <ul class="list-unstyled chat-list" data-simplebar="init"
                                        style="max-height: 410px;">
                                        <div class="simplebar-wrapper" style="margin: 0px;">
                                            <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                            </div>
                                            <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                                    <div class="simplebar-content-wrapper"
                                                         style="height: auto; overflow: hidden scroll;">
                                                        <div class="simplebar-content" style="padding: 0px;">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="simplebar-placeholder"
                                                 style="width: auto; height: 483px;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                            <div class="simplebar-scrollbar"
                                                 style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                            <div class="simplebar-scrollbar"
                                                 style="height: 348px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                                        </div>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane" id="groups">
                                <h5 class="font-size-14 mb-3">Groups</h5>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Create new group</button>
                                <ul class="list-unstyled chat-list" data-simplebar="init" style="max-height: 410px;">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper"
                                                     style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        @if($groups)
                                                            @foreach($groups as $group)
                                                        <li>
                                                            <a onclick="groupMessages('{{$group->group->id}}','{{$group->group->name}}')" >
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-xs">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                                                            {{strtoupper($group->group->name[0])}}
                                                                        </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex-grow-1">
                                                                        <h5 class="font-size-14 mb-0">{{isset($group->group->name)?$group->group->name:'sdsd'}}</h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                            @endforeach
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar"
                                             style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar"
                                             style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                </ul>
                            </div>

                            <div class="tab-pane" id="contacts">
                                <h5 class="font-size-14 mb-3">Contacts</h5>

                                <div data-simplebar="init" style="max-height: 410px;">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper"
                                                     style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <div>
                                                            <div class="avatar-xs mb-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                                                A
                                                            </span>
                                                            </div>

                                                            <ul class="list-unstyled chat-list">
                                                                <li>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Adam Miller</h5>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Alfonso
                                                                            Fisher</h5>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="mt-4">
                                                            <div class="avatar-xs mb-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                                                B
                                                            </span>
                                                            </div>

                                                            <ul class="list-unstyled chat-list">
                                                                <li>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Bonnie Harney</h5>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="mt-4">
                                                            <div class="avatar-xs mb-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                                                C
                                                            </span>
                                                            </div>

                                                            <ul class="list-unstyled chat-list">
                                                                <li>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Charles Brown</h5>
                                                                    </a>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Carmella
                                                                            Jones</h5>
                                                                    </a>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Carrie
                                                                            Williams</h5>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="mt-4">
                                                            <div class="avatar-xs mb-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                                                D
                                                            </span>
                                                            </div>

                                                            <ul class="list-unstyled chat-list">
                                                                <li>
                                                                    <a href="javascript: void(0);">
                                                                        <h5 class="font-size-14 mb-0">Dolores
                                                                            Minter</h5>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar"
                                             style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar"
                                             style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="w-100 user-chat">
                <div class="card" id="chatData">
                    <div class="p-4 border-bottom ">
                        <div class="row">
                            <div class="col-md-4 col-9">
                                <h5 class="font-size-15 mb-1" id="toUserName"></h5>
{{--                                <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle me-1"></i>--}}
{{--                                    Active now</p>--}}
                            </div>
                            <div class="col-md-8 col-3">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    <li class="list-inline-item d-none d-sm-inline-block">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-search-alt-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                                <form class="p-3">
                                                    <div class="form-group m-0">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Search ..."
                                                                   aria-label="Recipient's username">

                                                            <button class="btn btn-primary" type="submit"><i
                                                                    class="mdi mdi-magnify"></i></button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  d-none d-sm-inline-block">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">View Profile</a>
                                                <a class="dropdown-item" href="#">Clear chat</a>
                                                <a class="dropdown-item" href="#">Muted</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else</a>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="chat-conversation p-3" id="convesationData">

{{--                    @php($data = getConversation(loggedInUserId()))--}}
{{--                            {!! $data !!}--}}
                        </div>
                        <div class="p-3 chat-input-section">
{{--                            <form enctype="multipart/form-data" action="#">--}}
                            <div class="row">
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" class="form-control chat-input"
                                               placeholder="Enter Message..." id="messageText">
                                        <div class="chat-input-links" id="tooltip-container">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a href="javascript: void(0);"
                                                                                title="Emoji"><i
                                                            class="mdi mdi-emoticon-happy-outline"></i></a></li>
                                                <li class="list-inline-item"><a href="javascript: void(0);"
                                                                                title="Images"><i
                                                            class="mdi mdi-file-image-outline"></i></a></li>
                                                <li class="list-inline-item">
{{--                                                    <input type="file" id="imageData" class="mdi mdi-file-document-outlin">--}}
                                                    <a href="javascript: void(0);"
                                                                                title="Add Files"0><i
                                                            class="mdi mdi-file-document-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <input type="hidden" id="toUserId">
                                    <input type="hidden" id="groupId">
                                    <div id="submitButton">

                                    </div>
                                </div>
                            </div>
{{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('create.group')}}" method="post" id="addgroupModal">
                    {{csrf_field()}}

                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Create new group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            @if($users)
                            <div class="flex d-inline-flex" >
                            @foreach($users as $key => $user)
                                    @if($user->id != loggedInUserId())

                                            <div class="flex-shrink-0 align-self-center me-3 ml-6">
                                                <img src="assets/images/users/avatar-1.jpg" class="avatar-xs rounded-circle" alt="">
                                            </div>
                                            <div class="flex">
                                                <label for="userCheckbox{{$user->id}}">{{$user->first_name}} {{$user->last_name}} </label>
                                                <input type="checkbox" value="{{$user->id}}" name="groupUser[]" id="userCheckbox{{$user->id}}">
                                            </div>
                                    @endif
                                @endforeach
                                <input type="hidden" value="{{loggedInUserId()}}" name="groupUser[]" >
                            </div>
                            @endif
                        </div>
                        <div class="mt-5">
                        <label>Group name</label>
                          <input type="text" name="groupName" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create new group</button>
                    </div>
                </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
@endsection
@section('script')
    @include('my_course.articles.script')
    <script>
        $('#chatData').hide()
        function openInChatBox(userId,first) {
           var buttonData = '<button type="submit" onclick="sendMessageToUser()"\n' +
               'class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light">\n' +
               '<span class="d-none d-sm-inline-block me-2" >Send</span> <i\n' +
               'class="mdi mdi-send"></i></button>'
            $('#submitButton').html(buttonData);
            $('#chatData').show();
        $('#toUserName').html(first);
            $.ajax({
                url:'{{ route('chat.chatData') }}',
                data: {userId:userId, "_token": "{{ csrf_token() }}"},
                type: 'post',
                success:function (data) {
                    if(data.success == '1'){
                        $('#convesationData').html(data.conversation)
                    }
                },
                error:function () {

                }
            })
        $('#toUserId').val(userId);
        }

        function sendMessageToUser() {
          var userId=   $('#toUserId').val();
          var message=   $('#messageText').val();

        $.ajax({
            url:'{{ route('chat.store') }}',
            data: {userId:userId, message:message, "_token": "{{ csrf_token() }}"},
            type: 'Post',
            success:function (data) {
            if(data.success == '1'){
            $('#convesationData').html(data.conversation);
                $('#messageText').val('')
            }
            },
            error:function () {

            }
        })
        }
        function addGroupMessages() {
            var message=   $('#messageText').val();
            $.ajax({
                url:'{{ route('add.group.messages') }}',
                data: {groupId: $('#groupId').val(), message:message, "_token": "{{ csrf_token() }}"},
                type: 'Post',
                success:function (data) {
                    if(data.success == '1'){
                        $('#convesationData').html(data.conversation);
                        $('#messageText').val('')
                    }
                },
                error:function () {

                }
            })
        }
        function groupMessages(groupId,groupName) {
            var buttonData = '<button type="submit" onclick="addGroupMessages()"\n' +
                'class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light">\n' +
                '<span class="d-none d-sm-inline-block me-2" >Send</span> <i\n' +
                'class="mdi mdi-send"></i></button>'
            $('#submitButton').html(buttonData);
            $('#chatData').show();
            $('#toUserName').html(groupName);

            $('#groupId').val(groupId);
            $.ajax({
                url:'{{ route('group.messages') }}',
                data: {groupId:groupId,  "_token": "{{ csrf_token() }}"},
                type: 'Post',
                success:function (data) {
                    if(data.success == '1'){
                        $('#convesationData').html(data.conversation)
                    }
                },
                error:function () {

                }
            })
        }
    </script>
@endsection
