<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class CustomerController extends Controller
{
    protected $_currentRoute;

	public function __construct(){
		$this->_currentRoute = Route::currentRouteName();
		$this->_data['currentRoute'] = $this->_currentRoute;
		//echo $this->_data['currentRoute'];die;
          
	}
	public function getadd(){
    	return view('customer/add_customer',$this->_data);
    }
    public function getlist(){
    	return view('customer/list_customer',$this->_data);
    }
    public function getedit($id){
    	$this->_data['id'] = $id;
    	return view('customer/edit_customer',$this->_data);
    }
    public function getdetail($id){
    	$this->_data['id'] = $id;
    	return view('customer/detail_customer',$this->_data);
    }
}
