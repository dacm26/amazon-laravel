@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Shipper</h1>
<br>
<p>
  <strong>Name:</strong>
  {{ $shipper->name }}
</p>
  
<p>
  <strong>Mobile:</strong>
  {{ $shipper->mobile }}
</p>
  
<p>
  <strong>Email:</strong>
  {{ $shipper->email }}
</p>

<p>
  <strong>Percentage:</strong>
  {{ $shipper->percentage }} %
</p>

{{ link_to_edit_shipper($shipper)  }}
{{ link_to_route('shippers.index','Back') }}

@stop