<?php
/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 9/23/2015
 * Time: 1:42 PM
 */

class TestController extends BaseController{

    public function cartTest(){

     //  Cart::add(array('rowid'=>'w1','name'=>'Sugar','qty'=>2,'price'=>34000));

        $c = Cart::content()->first();
        dd($c->rowid);
     //   $c=Cart::get('23576bd9795f9a68d28a6c0c4fbabf35');
      //  $c->lists('name');
     //   dd($c->price);
        //$cart = Cart::content();

        //   dd($c);

    }
}