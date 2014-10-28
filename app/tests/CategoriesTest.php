<?php

class CategoriesTest extends TestCase {
  
  public function testCreateCategory(){
    $category = new Category();
    
    $category->name = 'test example name';
    $category->description = 'Some Description';
    $category->code = 'QA';
    $category->tax_free = false;
   
    $this->assertEquals($category->name,'test example name'); 
    $this->assertEquals($category->description,'Some Description'); 
    $this->assertEquals($category->code,'QA'); 
    $this->assertEquals($category->tax_free,false); 
  }
  
  public function testInputEmptyData(){
    $category = new Category();
   
    $this->assertEmpty($category->name); 
    $this->assertEmpty($category->description); 
    $this->assertEmpty($category->code); 
    $this->assertEmpty($category->tax_free); 
  }
  
  public function testInputType(){
    $category = new Category();
    
    $category->name = 'test example name';
    $category->description = 'Some Description';
    $category->code = 'QA';
    $category->tax_free = false;
    
    $this->assertInternalType('string',$category->name); 
    $this->assertInternalType('string',$category->description); 
    $this->assertInternalType('string',$category->code); 
    $this->assertInternalType('bool',$category->tax_free);
  } 
}