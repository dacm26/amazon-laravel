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




function link_to_show_shipper(Shipper $shipper){
  return link_to_route('shippers.show','Show',[$shipper->id]);
}

function link_to_edit_shipper(Shipper $shipper){
  return link_to_route('shippers.edit','Edit',[$shipper->id]);
}

function link_to_create_shipper(){
  return link_to_route('shippers.create','Create an Shipper');
}


function link_to_show_brand(Brand $brand){
  return link_to_route('brands.show','Show',[$brand->id]);
}

function link_to_edit_brand(Brand $brand){
  return link_to_route('brands.edit','Edit',[$brand->id]);
}

function link_to_create_brand(){
  return link_to_route('brands.create','Create an Brand');
}


function link_to_show_product(Product $product){
  return link_to_route('products.show','Show',[$product->id]);
}

function link_to_edit_product(Product $product){
  return link_to_route('products.edit','Edit',[$product->id]);
}

function link_to_create_product(){
  return link_to_route('products.create','Create an Product');
}

function link_to_show_customer(Customer $customer){
  return link_to_route('customers.show','Show',[$customer->id]);
}

function link_to_edit_customer(Customer $customer){
  return link_to_route('customers.edit','Edit',[$customer->id]);
}

function link_to_create_customer(){
  return link_to_route('customers.create','Create an Customer');
}

function link_to_edit_tax(Tax $tax){
  return link_to_route('taxes.edit','Edit',[$tax->id]);
}


function link_to_show_discount(Discount $discount){
  return link_to_route('discounts.show','Show',[$discount->id]);
}

function link_to_edit_discount(Discount $discount){
  return link_to_route('discounts.edit','Edit',[$discount->id]);
}

function link_to_create_discount(){
  return link_to_route('discounts.create','Create an Discount');
}
