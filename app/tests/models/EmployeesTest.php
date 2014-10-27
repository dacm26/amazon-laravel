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
}