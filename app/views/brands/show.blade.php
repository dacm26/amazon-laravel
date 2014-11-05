@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Brand</h1>
<br>
<p>
  <strong>Name:</strong>
  {{ $brand->name }}
</p>

{{ link_to_edit_brand($brand)  }}
{{ link_to_route('brands.index','Back') }}

@stop