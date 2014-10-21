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

