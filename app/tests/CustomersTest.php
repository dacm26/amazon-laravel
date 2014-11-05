<?php

class CustomersTest extends TestCase {
  
  public function testCreateCustomer(){
    $customer = new Customer();
    
    $customer->name = 'test example name';
    $customer->email = 'email@dcjj.com';
    $customer->address = 'asdf1234';
    $customer->postal_code = 11001;
    $customer->birthday = '1990-01-01';
    $customer->mobile = 22200000;
    $customer->gender = 'F';
    $customer->password = 'asdf1234';
    $customer->role_id = 1;
   
    $this->assertEquals($customer->name,'test example name'); 
    $this->assertEquals($customer->email,'email@dcjj.com'); 
    $this->assertEquals($customer->address,'asdf1234');
    $this->assertEquals($customer->postal_code,11001);  
    $this->assertEquals($customer->birthday,'1990-01-01'); 
    $this->assertEquals($customer->mobile,22200000); 
    $this->assertEquals($customer->gender,'F'); 
    $this->assertNotEquals($customer->password,'asdf1234'); 
    $this->assertEquals($customer->role_id, 1); 
  }
  
  public function testEmptyInputData(){
    $customer = new Customer();
    
    $this->assertEmpty($customer->name); 
    $this->assertEmpty($customer->email);
    $this->assertEmpty($customer->address);
    $this->assertEmpty($customer->postal_code);
    $this->assertEmpty($customer->birthday); 
    $this->assertEmpty($customer->mobile); 
    $this->assertEmpty($customer->gender); 
    $this->assertEmpty($customer->password); 
    $this->assertEmpty($customer->role_id); 
  }
  
  public function testInputType(){
    $customer = new Customer();
    
    $customer->name = 'test example name';
    $customer->email = 'email@dcjj.com';
    $customer->address = 'asdf1234';
    $customer->postal_code = 11001;
    $customer->birthday = '1990-01-01';
    $customer->mobile = 22200000;
    $customer->gender = 'F';
    $customer->password = 'asdf1234';
    $customer->role_id = 1;
    
    $this->assertInternalType('string',$customer->name);
    $this->assertInternalType('string',$customer->email);
    $this->assertInternalType('string','asdf1234');
    $this->assertInternalType('int',11001);
    $this->assertInternalType('string',$customer->birthday);
    $this->assertInternalType('int',$customer->mobile);
    $this->assertInternalType('string',$customer->gender);
    $this->assertInternalType('string',$customer->password);
    $this->assertInternalType('int',$customer->role_id);
  }
}