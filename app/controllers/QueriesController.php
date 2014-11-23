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
    $customer=Customer::where('name','LIKE','%'.$keyword.'%')->first();
    $orders=Order::where('customer_id','=',$customer->id)->where('order_date','>=',$start)->where('order_date','<=',$end)->get();
    return View::make('queries.orders_index',compact('orders'));
  }
    public function orders_show($id)
	{
    $order = Order::findOrFail($id);
    return $order;
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
		return View::make('queries.pro_cat_index');
	}  

}