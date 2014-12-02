<h1 class="page-header">My Order</h1>
    <br>


            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Customer: <b> {{ $user }} </b></h4>
                        <br>
                        <h4>Products in this Order:</h4>
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $detail)
                                        <tr>
                                          <?php  $product = Product::findOrFail($detail->product_id) ?>
                                          <td>{{ $product->code }}</td>
                                          <td>{{ $product->name }}</td>
                                          <td>{{ $product->price }}</td>
                                          <td>{{ $detail->quantity }}</td>
                                          <td>$ {{ $product->price*$detail->quantity  }}</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                           </div>
                        </div>
                        <h4 style="text-align:right">Sub total: <b>$ {{ number_format($items_total,2) }}</b></h4>
                        <h4 style="text-align:right">Shipping: <b>$ {{ number_format($shipping,2) }}</b></h4>
                        <h4 style="text-align:right">Discounts: <b>$ {{ number_format($discounts,2) }}</b></h4>
                        <HR width=95%>
                        <h4 style="text-align:right">Total Before Taxes: <b>$ {{ number_format($sub_total,2) }}</b></h4>
                        <h4 style="text-align:right">Taxes: <b>$ {{ number_format($tax,2) }}</b></h4>
                        <HR width=95%>
                        <h2 style="text-align:right">Total: <b>$ {{ number_format($total,2)  }}</b></h2>
                          
                        <br>

                    </div>







</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
