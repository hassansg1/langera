@extends('components.datatable')
@section('table_header')
    <th>Name</th>
    <th>Code</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
