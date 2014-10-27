<?php

class RoleTest extends TestCase {
  
  public function testCreateRoles(){
    $role = new Role();
    $role->name = 'testexample';
   
    $this->assertEquals($role->name,'testexample'); 
  }
  
  public function testValidationEmptyName(){
    $role = new Role();
   
    $this->assertEmpty($role->name);
  }
}