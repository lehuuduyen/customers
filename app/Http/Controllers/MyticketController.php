<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class MyticketController extends Controller
{

    protected $_currentRoute;

	public function __construct(){
		$this->_currentRoute = Route::currentRouteName();
		$this->_data['currentRoute'] = $this->_currentRoute;
//		echo $this->_data['currentRoute'];die;

	}

    public function getlist($id){
        $this->_data['id'] = $id;
    	return view('ticket/list_myticket',$this->_data);
    }

    public function getdetail($id){
    	$this->_data['id'] = $id;
    	return view('ticket/detail_ticket',$this->_data);
    }
}
