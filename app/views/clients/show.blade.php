@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
<h2>Show Client</h2>

<p>
  <strong>Name:</strong>
  {{ $client->name }}
</p>
  
<p>
  <strong>Mobile:</strong>
  {{ $client->mobile }}
</p>
  
<p>
  <strong>Email:</strong>
  {{ $client->email }}
</p>
  
<p>
  <strong>Adress:</strong>
  {{ $client->adress }}
</p>

<p>
  <strong>Zipcode:</strong>
  {{ $client->zipcode }}
</p>  
  
<p>
  <strong>Birthday:</strong>
  {{ $client->birthday }}
</p>
  

  
<p>
  <strong>Gender:</strong>
  {{ $client->gender }}
</p>

  
  

{{ link_to_edit_client($client)  }}
{{ link_to_route('clients.index','Back') }}

</div>
@stop