<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\CustomerRequest;
use Illuminate\Pagination\Paginator;
use App\Customer;
use DB;

class CustomerController extends Controller
{
    public function index(){
        $data =  DB::table('Customers')->paginate(1);
        return $data;
    	//var_dump(json_decode($data,true));
    }


    public function show($id){
    	$data = Customer::find($id)->tojson();
        return $data;
    }   


    public function store(CustomerRequest $request){
    
        $data_post = $request->all();

        $data['txtname'] = $request->txtname;
        $data['txtdob'] = $request->txtdob;
        $data['txtaddress'] = $request->txtaddress;
        $data['txtphone'] = ($request->txtphone) ? $request->txtphone : "";
        $data['txtlocation'] = ($request->txtlocation) ? $request->txtlocation :"";
        $data['txtmac_address'] = ($request->txtmac_address) ? $request->txtmac_address:"";
        $data['txtcreatclient'] = $request->txtcreatclient;
        $data['state'] = $request->state;

        foreach ($data as $key=>$item) {
            if(in_array($item, $data_post)){
                unset($data_post[$key]);
            }
        }
        $content = json_encode($data_post);

    	$data_add = new Customer;
        $data_add->campaign_name = "";
        $data_add->fullname = $data['txtname'];
        $data_add->dob = $data['txtdob'];
        $data_add->address = $data['txtaddress'];
        $data_add->phone_number = $data['txtphone'];
        $data_add->location_name = $data['txtlocation'];
        $data_add->mac_address = $data['txtmac_address'];
        $data_add->state = $data['state'];
        $data_add->content = $content;
        $data_add->created_client_at = $data['txtcreatclient'];
        $data_add->save();
        return response()->json([
            'status' => 'Thêm dữ liệu thành công'
        ]);
    }
    public function update($id){
    	echo "Đây là trang update metho PUT co id=".$id;
    }
    public function delete($id){
    	echo "Đây là trang delete co id= ".$id;
    }
}
