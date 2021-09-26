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
