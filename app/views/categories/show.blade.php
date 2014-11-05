@extends('layouts.default')

@section('content')

<h1 class="page-header">Show Category</h1>
<br>
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


@stop