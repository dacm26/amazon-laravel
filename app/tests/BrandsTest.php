<?php

class BrandsTest extends TestCase {
  
  public function testCreateBrand(){
    $brand = new Brand();
    
    $brand->name = 'test example name';
   
    $this->assertEquals($brand->name,'test example name');
  }
  
  public function testEmptyInputData(){
    $brand = new Brand();
    
    $this->assertEmpty($brand->name); 
  }
  
  public function testInputType(){
    $brand = new Brand();
    
    $brand->name = 'test example name';
    
    $this->assertInternalType('string',$brand->name);
  }
}