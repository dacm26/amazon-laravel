@extends('layouts.default')

@section('content')
    @if (count($brands) >= 1 and count($categories) >= 1)
<h1 class="page-header">Show Discount</h1>
<br>
<p>
  <strong>Discount:</strong>
  {{ $discount->discount }}
</p>

<p>
  <strong>Start Date:</strong>
  {{ $discount->datestart }}
</p>

<p>
  <strong>End Date:</strong>
  {{ $discount->dateend }}
</p>

<p>
  <strong>Brand:</strong>
  {{ Brand::find($discount->brand_id)->name }}
</p>

<p>
  <strong>Category:</strong>
  {{ Category::find($discount->category_id)->name }}
</p>
<p>
  <strong>Inactive:</strong>
  @if($discount->inactive)
      Yes
  @else
      No
  @endif
</p>
<p>
  <strong>Created At:</strong>
  {{ $discount->created_at }}
</p>

<p>
  <strong>Updated At:</strong>
  {{ $discount->updated_at }}
</p>   
  
<p>
  <strong>Updated By:</strong>
  {{ $discount->updated_by }}
</p>  
{{ link_to_edit_discount($discount)  }}
{{ link_to_route('discounts.index','Back') }}
     @else
          <h1>You need to have brands and categories, to create discounts!!</h1>
    @endif
@stop