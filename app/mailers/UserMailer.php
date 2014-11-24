<?php namespace Acme\Mailers;
use Customer;
use Cart;
class UserMailer extends Mailer{
  public function welcome(Customer $user, $total,$items,$shipper){
    
    
    $data = array(
        'cart' => 'hello',
    );
    $view = 'emails.welcome';
    $subject = 'Welcome to amazon';
    # #array('key' => aqui va la queryy cerda
    return $this->sendTo($user, $subject, $view, array('key' => $total,
                                                       'items' => $items,
                                                       'shipper' => $shipper,
                                                        'user' => $user->name));
  }
  
  
  
} 