<?php

class RoleTest extends TestCase {
  
  public function testRoles(){
    $role = new Role();
    $role->name = 'testexample';
   
    $this->assertEquals($role->name,'testexample'); 
  }
}