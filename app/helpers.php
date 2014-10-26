<?php



function link_to_show_role(Role $role){
  return link_to_route('roles.show','Show',[$role->id]);
}

function link_to_edit_role(Role $role){
  return link_to_route('roles.edit','Edit',[$role->id]);
}

function link_to_create_role(){
  return link_to_route('roles.create','Create a Role');
}


function link_to_show_employee(Employee $employee){
  return link_to_route('employees.show','Show',[$employee->id]);
}

function link_to_edit_employee(Employee $employee){
  return link_to_route('employees.edit','Edit',[$employee->id]);
}

function link_to_create_employee(){
  return link_to_route('employees.create','Create an Employee');
}


function link_to_show_category(Category $category){
  return link_to_route('categories.show','Show',[$category->id]);
}

function link_to_edit_category(Category $category){
  return link_to_route('categories.edit','Edit',[$category->id]);
}

function link_to_create_category(){
  return link_to_route('categories.create','Create a Category');
}


