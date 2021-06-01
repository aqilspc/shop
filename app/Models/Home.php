<?php

namespace App\Models;

use DB;
use Auth;
class Home
{
    public function getHome()
    {
         $data = DB::table('homes')->where('id',1)->first();
         return $data;
    }

    public function getProduct()
    {
         $data =  DB::table('products as ps')
        ->join('categories as cs','ps.category_id','=','cs.id')
        ->select('cs.category_name','ps.*')
        ->get();
         return $data;
    }

    public function countItem($id)
    {
    	$data=DB::table('transaction_items')->where('transaction_id',$id)->count();
    	return $data;
    }

    public function getPrice($id)
    {
        $data=DB::table('products')->where('id',$id)->first();
        return $data->price;
    }

    public function getNameProduct($id)
    {
        $data=DB::table('products')->where('id',$id)->first();
        return $data->product_name;
    }

     public function get_user_id($id)
    {
    	$data=DB::table('users')->where('id',$id)->first();
    	return $data->name;
    }

    public function getCart()
    {
        if(Auth::check())
        {
            $data = DB::table('carts')->where('user_id',Auth::user()->id)->where('checkout',0)->count();
            return $data;
        }else
        {
            return ' ';
        }
    }

}
