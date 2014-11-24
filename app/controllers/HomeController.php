<?php
use Carbon\Carbon;
use Acme\Mailers\UserMailer as Mailer;
class HomeController extends BaseController {
  protected $mailer;
  public function __construct(Mailer $mailer ){
    $this->mailer = $mailer;
  }
  private static $shipper_id;

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		return View::make('home.index', compact('categories'));
	}
	public function search()
	{
    $keyword=Input::get('keyword');
    $category=Input::get('category');
    $products=Product::where('name','LIKE','%'.$keyword.'%')->where('inactive','=', 0)->where('category_id','=',$category)->get();  
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		return View::make('home.search', compact('categories','products','keyword'));
	}
	public function show($id)
	{
    $product =Product::findOrFail($id);
    $product->visits=$product->visits+1;
    $product->save();
    $wish =Wishlist::where('customer_id','=',Auth::customer()->user()->id)->where('product_id','=',$id)->first();
    $cart =Cart::where('customer_id','=',Auth::customer()->user()->id)->where('product_id','=',$id)->first();
    $check=0;
    if($wish){
      $check=1;
    }
    $check2=0;
    if($cart){
      $check2=1;
    }
    $brand=Brand::findOrFail($product->brand_id);
    $category=Category::findOrFail($product->category_id);
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		return View::make('home.show', compact('categories','category','product','brand','check','check2'));
	}
  
  public function add_to_wishlist($id){
    $product =Product::findOrFail($id);
    $customer = Customer::findOrFail(Auth::customer()->user()->id);
    $wishlist= Wishlist::create([
      'customer_id' => $customer->id,
      'product_id' => $product->id,
      'updated_by' => Auth::customer()->user()->email
    ]);
    $items =Wishlist::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $products->add($product);
    }
    return View::make('home.wishlist',compact('products','categories'));
    
  }
  public function wishlist(){
    $items =Wishlist::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $products->add($product);
    }
    return View::make('home.wishlist',compact('products','categories'));
  }
  
  public function remove_wishlist_item($id){
    $wish =Wishlist::where('customer_id','=',Auth::customer()->user()->id)->where('product_id','=',$id)->first();
    Wishlist::destroy($wish->id);
    $items =Wishlist::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $products->add($product);
    }
    return View::make('home.wishlist',compact('products','categories'));
  }

  public function add_to_cart($id){
    
    
    $product =Product::findOrFail($id);
    $customer = Customer::findOrFail(Auth::customer()->user()->id);

    $cart= Cart::create([
      'customer_id' => $customer->id,
      'product_id' => $product->id,
      'quantity' => Input::get('quantity'),
      'updated_by' => Auth::customer()->user()->email
    ]);
    $items =Cart::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;
    $total=0;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $total+=$product->price*$item->quantity;
      $products->add($product);
    }

    return View::make('home.cart',compact('products','categories','total'));
    
  }
  public function cart(){
    $items =Cart::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;
    $total=0;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $total+=$product->price*$item->quantity;
      $products->add($product);
    }
    return View::make('home.cart',compact('products','categories','total'));
  }
  
  public function remove_cart_item($id){
    $cart =Cart::where('customer_id','=',Auth::customer()->user()->id)->where('product_id','=',$id)->first();
    Cart::destroy($cart->id);
    $items =Cart::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;
    $total=0;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $total+=$product->price*$item->quantity;
      $products->add($product);
    }
    return View::make('home.cart',compact('products','categories','total'));
  }
  public function add_card(){
    
    $cards=Card::where('customer_id','=',Auth::customer()->user()->id)->get()->lists('name','id');
    if($cards){
     return Redirect::to('order/create');
    }
    else{
          $categories = Category::where('inactive','=','false')->get()->lists('name','id');
          return View::make('home.card',compact('categories'));
    }

  }
  
  public function store_card(){
    $validator = Validator::make( Input::all(), Card::$rules['create'] ); 

    if ( $validator->fails()) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $month=Input::get('month');
    $year=Input::get('year');
    $day=15;
    $tz=Carbon::now()->tzName;
    $date=Carbon::createFromDate($year, $month, $day, $tz);
    $card= Card::create([
      'name' => Input::get('name'),
      'number' => Input::get('number'),
      'code' => Input::get('code'),
      'customer_id' => Auth::customer()->user()->id,
      'balance' => 1000.00,
      'frozen_balance' => 0.00,
      'expiration_date' =>$date,
      'updated_by' => Auth::customer()->user()->email
    ]);
    $card->save();
    return Redirect::to('order/create');
  }
  public function add_order(){
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    
    $shipper = (Shipper::where('inactive','=','false')->orderByRaw("RAND()")->first());//multiplicar por el total
    $shipping = ($shipper->percentage)/100;
    $taxes = (Tax::all()->first());//multiplicar por el total
    $tax = ($taxes->value)/100;
    $tax_total=0;
    $items =Cart::where('customer_id','=',Auth::customer()->user()->id)->get();
    $products=new \Illuminate\Database\Eloquent\Collection;
    $sub_total=0;
    $total=0;
    $total_discount=0;
    $discount=0;
    $now=Carbon::now();
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $brand=Brand::findOrFail($product->brand_id);
      $category=Category::findOrFail($product->category_id);
      $discounts=Discount::where('inactive','=','false')->where('category_id','=',$category->id)->where('brand_id','=',$brand->id)->get();
      foreach($discounts as $disc){
        $temp_date=new Carbon($disc->dateend);
        $temp_date2=new Carbon($disc->datestart);
          if($temp_date2<=$now and $now<=$temp_date){
              $discount=$disc->discount;
              break;
          }
      }
      $discount=($discount/100)*$product->price*$item->quantity;;
      $total_discount+=$discount;
      if(!($category->tax_free)){//Si no está exenta de impuestos
        $tax_total+=$product->price*$item->quantity*$tax;
      }
      
      
      $sub_total+=$product->price*$item->quantity;
      $products->add($product);
    }
    
    if($products->isEmpty()){
      return Redirect::to('cart');
    }
    $shipping=$shipping*$sub_total;
    $total=$sub_total+$shipping-$total_discount;
    $tax= $tax_total;
    return View::make('home.order',compact('categories','sub_total','total','shipping','tax','total_discount','shipper'));
  }
  
  
  public function store_order(){
    $date=Carbon::now();
    $today=Carbon::today();
    $card=Card::where('customer_id','=',Auth::customer()->user()->id)->first();
    $items =Cart::where('customer_id','=',Auth::customer()->user()->id)->get();
    $no_units_in_stock=false;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $temp=$product->units_in_stock-$item->quantity;
      if($temp <0){
        $no_units_in_stock=true;
        break;
      }
    }
    if(($card->balance < Input::get('total')) or ($card->expiration_date <= $today) or ($card->inactive) or  ($no_units_in_stock) ){
      return Redirect::to('cart');
    }
    $order= Order::create([
      'order_date' => $date,
      'customer_id' => Auth::customer()->user()->id,
      'shipper_id' => Input::get('shipper'),
      'updated_by' => Auth::customer()->user()->email
    ]);
    
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $product->units_in_stock=$product->units_in_stock-$item->quantity;
      $product->save();
      $temp=OrderDetails::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => $item->quantity
      ]);
    }
    $card->balance=$card->balance-Input::get('total');
    $card->frozen_balance=$card->frozen_balance+Input::get('total');
    $card->save();
    /*email
    */
    $customer = Customer::findOrFail(Auth::customer()->user()->id);
    $usermailer = Customer::find($customer->id);
    $this->mailer->welcome($usermailer,Input::get('total'),$items,Input::get('shipper'));
    /*Mailer
    */
    Cart::where('customer_id','=',Auth::customer()->user()->id)->delete();
    
    return Redirect::to('cart');
  }

}
