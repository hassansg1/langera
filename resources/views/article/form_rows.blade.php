@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>
        <td>{{ $item->first_name }}</td>
        <td>{{ $item->last_name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->mobile_no }}</td>
        <td>{{ $item->role }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
