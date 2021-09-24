<button onclick="location.href='{{ route($route.".show",$item->id) }}'" title="View" type="button"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-eye"></i>
</button>
<button onclick="location.href='{{ route($route.".edit",$item->id) }}'" title="Edit" type="button"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-edit"></i>
</button>
<button onclick="if(confirm('Are you sure you want to delete?')) $('#delete_'+{{ $item->id }}).submit()"
        title="Delete" type="button"
        class="btn btn-light btn-form btn-no-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    <i class="fas fa-trash-alt"></i>
</button>
<form action="{{ route($route.".destroy",$item->id) }}" name="delete_{{ $item->id }}" id="delete_{{ $item->id }}"
      method="post">
    {{ csrf_field() }}
    @method('DELETE')
</form>
