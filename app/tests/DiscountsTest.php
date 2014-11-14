<?php

class DiscountsTest extends TestCase {
  
  public function testCreateDiscount(){
    $discount = new Discount();
    
    $discount->discount = 11.00;
    $discount->datestart = '2014-12-15';
    $discount->dateend = '2014-12-21';
    $discount->brand_id = 1;
    $discount->category_id = 1;
    
    $this->assertEquals($discount->discount,11.00);
    $this->assertEquals($discount->datestart,'2014-12-15');
    $this->assertEquals($discount->dateend,'2014-12-21');
    $this->assertEquals($discount->brand_id, 1);
    $this->assertEquals($discount->category_id, 1);   
  }
  
  public function testEmptyInputData(){
    $discount = new Discount();
    
    $this->assertEmpty($discount->discount); 
    $this->assertEmpty($discount->datestart); 
    $this->assertEmpty($discount->dateend); 
    $this->assertEmpty($discount->brand_id); 
    $this->assertEmpty($discount->category_id); 
  }
  
  public function testInputType(){
    $discount = new Discount();
    
    $discount->discount = 11.00;
    $discount->datestart = '2014-12-15';
    $discount->dateend = '2014-12-21';
    $discount->brand_id = 1;
    $discount->category_id = 1;
    
    $this->assertInternalType('float',$discount->discount);
    $this->assertInternalType('string',$discount->datestart);
    $this->assertInternalType('string',$discount->dateend);
    $this->assertInternalType('int',$discount->brand_id);
    $this->assertInternalType('int',$discount->category_id);
  }
}