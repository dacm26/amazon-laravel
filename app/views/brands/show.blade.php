@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Brand</h1>
<br>
<p>
  <strong>Name:</strong>
  {{ $brand->name }}
</p>
<p>
  <strong>Inactive:</strong>
  @if($brand->inactive)
      Yes
  @else
      No
  @endif
</p>
<p>
  <strong>Created At:</strong>
  {{ $brand->created_at }}
</p>

<p>
  <strong>Updated At:</strong>
  {{ $brand->updated_at }}
</p>

<p>
  <strong>Updated By:</strong>
  {{ $brand->updated_by }}
</p>
{{ link_to_edit_brand($brand)  }}
{{ link_to_route('brands.index','Back') }}

@stop