@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
    @if (count($brands) >= 1 and count($categories) >= 1)
<h2>Show Product</h2>

<p>
  <strong>Name:</strong>
  {{ $product->name }}
</p>
<p>
  <strong>Code:</strong>
  {{ $product->code }}
</p>
  
<p>
  <strong>Price:</strong>
  {{ $product->price }}
</p>
  
<p>
  <strong>Units in stock:</strong>
  {{ $product->units_in_stock }}
</p>
  
<p>
  <strong>Threshold:</strong>
  {{ $product->threshold }}
</p>
  
<p>
  <strong>Brand:</strong>
  {{ Brand::find($product->brand_id)->name }}
</p>

<p>
  <strong>Category:</strong>
  {{ Category::find($product->category_id)->name }}
</p>



{{ link_to_edit_product($product)  }}
{{ link_to_route('products.index','Back') }}
     @else
          <h1>You need to have brands and categories, to create products!!</h1>
    @endif
</div>