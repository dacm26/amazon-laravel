<?php

class EmployeesTest extends TestCase {
  
  public function testCreateEmployee(){
    $employee = new Employee();
    
    $employee->name = 'test example name';
    $employee->email = 'email@dcjj.com';
    $employee->birthday = '1990-01-01';
    $employee->mobile = 22200000;
    $employee->gender = 'F';
    $employee->password = 'asdf1234';
    $employee->role_id = 1;
   
    $this->assertEquals($employee->name,'test example name'); 
    $this->assertEquals($employee->email,'email@dcjj.com'); 
    $this->assertEquals($employee->birthday,'1990-01-01'); 
    $this->assertEquals($employee->mobile,22200000); 
    $this->assertEquals($employee->gender,'F'); 
    $this->assertNotEquals($employee->password,'asdf1234'); 
    $this->assertEquals($employee->role_id, 1); 
  }
  
  public function testEmptyInputData(){
    $employee = new Employee();
    
    $this->assertEmpty($employee->name); 
    $this->assertEmpty($employee->email); 
    $this->assertEmpty($employee->birthday); 
    $this->assertEmpty($employee->mobile); 
    $this->assertEmpty($employee->gender); 
    $this->assertEmpty($employee->password); 
    $this->assertEmpty($employee->role_id); 
  }
  
  public function testInputType(){
    $employee = new Employee();
    
    $employee->name = 'test example name';
    $employee->email = 'email@dcjj.com';
    $employee->birthday = '1990-01-01';
    $employee->mobile = 22200000;
    $employee->gender = 'F';
    $employee->password = 'asdf1234';
    $employee->role_id = 1;
    
    $this->assertInternalType('string',$employee->name);
    $this->assertInternalType('string',$employee->email);
    $this->assertInternalType('string',$employee->birthday);
    $this->assertInternalType('int',$employee->mobile);
    $this->assertInternalType('string',$employee->gender);
    $this->assertInternalType('string',$employee->password);
    $this->assertInternalType('int',$employee->role_id);
  }
}