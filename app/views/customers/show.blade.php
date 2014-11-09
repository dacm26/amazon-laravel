@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Customer</h1>
<br>
<p>
  <strong>Name:</strong>
  {{ $customer->name }}
</p>

<p>
  <strong>Email:</strong>
  {{ $customer->email }}
</p>

<p>
<strong>Postal Code:</strong>
  {{ $customer->postal_code }}
</p>

<p>
<strong>Address:</strong>
  {{ $customer->address }}
</p>
  
<p>
  <strong>Birthday:</strong>
  {{ $customer->birthday }}
</p>
  
<p>
  <strong>Mobile:</strong>
  {{ $customer->mobile }}
</p>
  
<p>
  <strong>Gender:</strong>
  {{ $customer->gender }}
</p>
<p>
  <strong>Inactive:</strong>
  @if($customer->inactive)
      Yes
  @else
      No
  @endif
</p>
<p>
  <strong>Created At:</strong>
  {{ $customer->created_at }}
</p>

<p>
  <strong>Updated At:</strong>
  {{ $customer->updated_at }}
</p> 
  
  

{{ link_to_edit_customer($customer)  }}
{{ link_to_route('customers.index','Back') }}

@stop