<?php namespace Acme\Mailers;
use Customer;
use Cart;
class UserMailer extends Mailer{
  public function welcome(Customer $user, $items_total,$details,$shipping,$discounts,$sub_total,$tax,$total){
    
    
    $data = array(
        'cart' => 'hello',
    );
    $view = 'emails.welcome';
    $subject = 'Welcome to amazon';
    # #array('key' => aqui va la queryy cerda
    return $this->sendTo($user, $subject, $view, array('items_total' => $items_total,
                                                       'details' => $details,
                                                       'shipping' => $shipping,
                                                       'user' => $user->name,
                                                       'discounts' => $discounts,
                                                       'sub_total' => $sub_total,
                                                       'tax' => $tax,
                                                       'total' => $total,
                                                      ));
  }
  
  
  
} 