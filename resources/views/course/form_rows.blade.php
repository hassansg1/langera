@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->name }}</td>
        <td>{{ $item->code }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
