<?php
use Carbon\Carbon;
class QueriesController extends \BaseController {


	public function orders_index()
	{
    $now=Carbon::today();//Por el formato de las fechas
    $orders =Order::where('order_date','=',$now)->get();
		return View::make('queries.orders_index',compact('orders'));
	}
  public function orders_search()
	{
    $start=Input::get('start');
    $end=Input::get('end');
    $start= new Carbon($start);
    $end= new Carbon($end);
    if (($start > $end) )
		{
			return Redirect::back()->withInput();
		}
    $keyword=Input::get('keyword');
    $customers=Customer::where('name','LIKE','%'.$keyword.'%')->orderBy('name','asc')->get();
    $orders=new \Illuminate\Database\Eloquent\Collection;;
    foreach($customers as $customer)
    {
      $temp=Order::where('customer_id','=',$customer->id)->where('order_date','>=',$start)->where('order_date','<=',$end)->get();
      foreach($temp as $t){
        $orders->add($t);
      }
      
    }
    
    return View::make('queries.orders_index',compact('orders'));
  }
    public function orders_show($id)
	{
    $order = Order::findOrFail($id);
    $details = OrderDetails::where('order_id','=',$id)->get();
    $sub_total=0;
    $discount=0;
    $date=new Carbon($order->created_at);
    $total_discount=0;
    $tax_total=0;
    $taxes = (Tax::all()->first());//multiplicar por el total
    $tax = ($taxes->value)/100;
    foreach($details as $detail){
      $product=Product::findOrFail($detail->product_id);
      $sub_total+=$detail->quantity*$product->price;
      $discount=0;
      $brand=Brand::findOrFail($product->brand_id);
      $category=Category::findOrFail($product->category_id);
      $discounts=Discount::where('inactive','=','false')->where('category_id','=',$category->id)->where('brand_id','=',$brand->id)->get();
      foreach($discounts as $disc){
        $temp_date=new Carbon($disc->dateend);
        $temp_date2=new Carbon($disc->datestart);
          if($temp_date2<=$date and $date<=$temp_date){
              $discount=$disc->discount;
              break;
          }
      }
      $discount=($discount/100)*$product->price*$detail->quantity;
      $total_discount+=$discount;
      if(!($category->tax_free)){//Si no está exenta de impuestos
        $tax_total+=$product->price*$detail->quantity*$tax;
      }      
    }
    $shipping=Shipper::findOrFail($order->shipper_id)->percentage;
    $shipping=$shipping/100;
    $shipping=$shipping*$sub_total;
    $total=$sub_total+$shipping-$total_discount;
    $tax= $tax_total;
    return View::make('queries.show',compact('order','details','sub_total','shipping','total_discount','tax','total'));
  }
	public function sales_index()
	{
    
    $now=Carbon::today();//Por el formato de las fechas
    $orders = OrderDetails::orderBy('product_id', 'asc')
                ->where('created_at','>=',$now)
                ->groupBy('product_id')
                ->get(array('product_id', DB::raw('sum(quantity) as quantity')));
    $total=0;
    foreach($orders as $order){
      $total+=$order->quantity*Product::findOrFail($order->product_id)->price;
    }
		return View::make('queries.sales_index',compact('orders','total'));
	}
  
  	public function sales_search()
	{
    $start=Input::get('start');
    $end=Input::get('end');
    $start=new Carbon($start);
    $end=new Carbon($end);

    if (($start > $end) )
		{
			return Redirect::back()->withInput();
		}
    $end->addDay();
    $orders = OrderDetails::orderBy('product_id', 'asc')
                ->where('created_at','>=',$start)
                ->where('created_at','<',$end)
                ->groupBy('product_id')
                ->get(array('product_id', DB::raw('sum(quantity) as quantity')));
    $total=0;
    foreach($orders as $order){
      $total+=$order->quantity*Product::findOrFail($order->product_id)->price;
    }
		return View::make('queries.sales_index',compact('orders','total'));
	}
	public function pro_cat_index()
	{
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    
    $now=Carbon::today();//Por el formato de las fechas
    $orders=DB::table('order_details')
                    ->join('products', 'products.id', '=', 'order_details.product_id')
                    ->orderBy('category_id', 'asc')
                    ->where('order_details.created_at','>=',$now)
                    ->groupBy('category_id')
                    ->get(array('category_id', DB::raw('sum(quantity) as quantity') ));
    $show=false;
		return View::make('queries.pro_cat_index',compact('orders','categories','show'));
	}
	public function pro_cat_search()
	{
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $start=Input::get('start');
    $end=Input::get('end');
    $start=new Carbon($start);
    $end=new Carbon($end);

    if (($start > $end) )
		{
			return Redirect::back()->withInput();
		}
    $end->addDay();
    $orders=DB::table('order_details')
                    ->join('products', 'products.id', '=', 'order_details.product_id')
                    ->orderBy('category_id', 'asc')
                    ->where('order_details.created_at','>=',$start)
                    ->where('order_details.created_at','<',$end)
                    ->groupBy('category_id')
                    ->having('category_id', '=', Input::get('category'))
                    ->get(array('category_id', DB::raw('sum(quantity) as quantity') ));
    $temp=DB::table('order_details')
                    ->join('products', 'products.id', '=', 'order_details.product_id')
                    ->orderBy('category_id', 'asc')
                    ->where('order_details.created_at','>=',$start)
                    ->where('order_details.created_at','<',$end)
                    ->where('category_id', '=', Input::get('category'))
                    ->groupBy('product_id')
                    ->get(array('product_id', DB::raw('sum(quantity) as quantity') ));
    $total=0;
    foreach($temp as $t){
      $total+=$t->quantity*Product::findOrFail($t->product_id)->price;
    }
    $show=true;
		return View::make('queries.pro_cat_index',compact('orders','categories','total','show'));
	}    

}