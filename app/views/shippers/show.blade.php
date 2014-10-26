@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
<h2>Show Shipper</h2>

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
  <strong>Porcentage:</strong>
  {{ $shipper->porcentage }}
</p>

{{ link_to_edit_shipper($shipper)  }}
{{ link_to_route('shippers.index','Back') }}

</div>