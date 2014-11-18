<?php
use Carbon\Carbon;
class HomeController extends BaseController {

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
      'updated_by' => Auth::customer()->user()->email
    ]);
    $items =Cart::where('customer_id','=',Auth::customer()->user()->id)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $products=new \Illuminate\Database\Eloquent\Collection;
    $total=0;
    foreach($items as $item)
    {
      $product=Product::findOrFail($item->product_id);
      $total+=$product->price;
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
      $total+=$product->price;
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
      $total+=$product->price;
      $products->add($product);
    }
    return View::make('home.cart',compact('products','categories','total'));
  }
  public function add_card(){
    
    $cards=Card::where('customer_id','=',Auth::customer()->user()->id)->get()->lists('name','id');
    if($cards){
      return $cards;
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
    return $card;
  }

}
