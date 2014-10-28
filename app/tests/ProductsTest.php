<?php

class ProductsTest extends TestCase {
  
  public function testCreateProducts(){
    $product = new Product();
    
    $product->name = 'test example name';
    $product->code = 'QAPR';
    $product->price = 99.99;
    $product->units_in_stock = 100;
    $product->threshold = 10;
    $product->brand_id = 1;
    $product->category_id = 1;
   
    $this->assertEquals($product->name, 'test example name');
    $this->assertEquals($product->code, 'QAPR');
    $this->assertEquals($product->price, 99.99);
    $this->assertEquals($product->units_in_stock, 100);
    $this->assertEquals($product->threshold, 10);
    $this->assertEquals($product->brand_id, 1);
    $this->assertEquals($product->category_id, 1);
  }
  
  public function testEmptyInputData(){
    $product = new Product();
    
    $this->assertEmpty($product->name);
    $this->assertEmpty($product->code);
    $this->assertEmpty($product->price);
    $this->assertEmpty($product->units_in_stock);
    $this->assertEmpty($product->threshold);
    $this->assertEmpty($product->brand_id);
    $this->assertEmpty($product->category_id);
  }
  
  public function testInputType(){
    $product = new Product();
    
    $product->name = 'test example name';
    $product->code = 'QAPR';
    $product->price = 99.99;
    $product->units_in_stock = 100;
    $product->threshold = 10;
    $product->brand_id = 1;
    $product->category_id = 1;
    
    $this->assertInternalType('string',$product->name);
    $this->assertInternalType('string',$product->code);
    $this->assertInternalType('float',$product->price);
    $this->assertInternalType('int',$product->units_in_stock);
    $this->assertInternalType('int',$product->threshold);
    $this->assertInternalType('int',$product->brand_id);
    $this->assertInternalType('int',$product->category_id);
  }
}