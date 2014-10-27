@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
<h2>Show Brand</h2>

<p>
  <strong>Name:</strong>
  {{ $brand->name }}
</p>

{{ link_to_edit_brand($brand)  }}
{{ link_to_route('brands.index','Back') }}

</div>
@stop