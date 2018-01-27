<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class TicketController extends Controller
{
    protected $_currentRoute;

	public function __construct(){
		$this->_currentRoute = Route::currentRouteName();
		$this->_data['currentRoute'] = $this->_currentRoute;
		//echo $this->_data['currentRoute'];die;
          
	}
	public function getadd(){
    	return view('ticket/add_customer',$this->_data);
    }
    public function getlist(){
    	return view('ticket/list_ticket',$this->_data);
    }
    public function getedit($id){
    	$this->data['id'] = $id;
    	return view('ticket/edit_customer',$this->_data);
    }
    public function getdetail($id){
    	$this->_data['id'] = $id;
    	return view('ticket/detail_customer',$this->_data);
    }
}
