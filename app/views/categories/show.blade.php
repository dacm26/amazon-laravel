@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
<h2>Show Category</h2>

<p>
  <strong>Name:</strong>
  {{ $category->name }}
</p>

<p>
  <strong>Description:</strong>
  {{ $category->description }}
</p>
  
<p>
  <strong>Code:</strong>
  {{ $category->code }}
</p>

  
  
<p>
  <strong>Tax Free:</strong>
  @if(($category->tax_free) == true)
      Yes
  @else
      No
  @endif
</p>
@foreach($attributes as $attribute) 
  <p>
  <strong>Name:</strong>
  {{ $attribute->name }}<br>
  <strong>Value:</strong>
  {{ $attribute->value }}<br>
</p>
@endforeach
  
  

{{ link_to_edit_category($category)  }}
{{ link_to_route('categories.index','Back') }}

</div>
@stop