<?php

class TaxesTest extends TestCase {
  
  public function testCreateTax(){
    $tax = new Tax();
    
    $tax->value = 12.5;
    
    $this->assertEquals($tax->value,12.5);
  }
  
  public function testEmptyInputData(){
    $tax = new Tax();
    
    $this->assertEmpty($tax->value); 
  }
  
  public function testInputType(){
    $tax = new Tax();
    
    $tax->value = 12.5;
    
    $this->assertInternalType('float',$tax->value);
  }
}