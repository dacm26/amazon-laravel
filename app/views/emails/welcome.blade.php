<h1>My Order</h1>
{{ $user }}<br>
{{ Shipper::findOrFail($shipper)->name }} <br>
@foreach($items as $item)
  {{Product::findOrFail($item->product_id)->name}}<br>
@endforeach

$ {{ $key }}<br>