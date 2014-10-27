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
}