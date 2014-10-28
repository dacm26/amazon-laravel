<?php

class ShippersTest extends TestCase {
  
  public function testCreateShipper(){
    $shipper = new Shipper();
    
    $shipper->name = 'test example name';
    $shipper->mobile = 22200000;
    $shipper->email = 'email@dcjj.com';
    $shipper->porcentage = 99.99;
    
    $this->assertEquals($shipper->name,'test example name'); 
    $this->assertEquals($shipper->mobile,22200000); 
    $this->assertEquals($shipper->email,'email@dcjj.com'); 
    $this->assertEquals($shipper->porcentage,99.99); 
  }
  
  public function testEmptyInputData(){
    $shipper = new Shipper();
    
    $this->assertEmpty($shipper->name);
    $this->assertEmpty($shipper->mobile); 
    $this->assertEmpty($shipper->email); 
    $this->assertEmpty($shipper->porcentage); 
  }
  
  public function testInputType(){
    $shipper = new Shipper();
    
    $shipper->name = 'test example name';
    $shipper->mobile = 22200000;
    $shipper->email = 'email@dcjj.com';
    $shipper->porcentage = 99.99;
    
    $this->assertInternalType('string',$shipper->name);
    $this->assertInternalType('int',$shipper->mobile);
    $this->assertInternalType('string',$shipper->email);
    $this->assertInternalType('float',$shipper->porcentage);
  }
}