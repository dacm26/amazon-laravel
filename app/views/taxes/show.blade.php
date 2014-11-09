@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Tax</h1>
<br>


<p>
  <strong>Value:</strong>
  {{ $tax->value }} %
</p>
<p>
  <strong>Created At:</strong>
  {{ $tax->created_at }}
</p>

<p>
  <strong>Updated At:</strong>
  {{ $tax->updated_at }}
</p>
<p>
  <strong>Updated By:</strong>
  {{ $tax->updated_by }}
</p> 
{{ link_to_edit_tax($tax)  }}

@stop