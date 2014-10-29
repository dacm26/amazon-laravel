<?php

class RoleTest extends TestCase {
  
  public function testCreateRoles(){
    $role = new Role();
    $role->name = 'testexample';
   
    $this->assertEquals($role->name,'testexample'); 
  }
  
  public function testInputEmptyData(){
    $role = new Role();
   
    $this->assertEmpty($role->name);
  }
  
  public function testInputType(){
    $role = new Role();
     
    $role->name = 'testexample';
    
    $this->assertInternalType('string',$role->name);
  }   
}