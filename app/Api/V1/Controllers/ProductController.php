<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\CustomerRequest;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Pagination\Paginator;
use App\Product;
use DB;
use Auth;


class ProductController extends Controller
{
    public function index(){
        $id = Auth::guard()->id();
        $data = DB::table('products')
            ->where('user_id', '=', $id)->paginate(2);
        return $data;
    }

    public function show($id){
    	$data = Product::find($id)->tojson();
        return $data;
    }   

    public function store(Request $request){

    	$data_add = new Product;
        $data_add->name = $request->txtname;
        $data_add->price = $request->txtprice;
        $data_add->content = $request->txtcontent;
        $data_add->user_id = 1;
        $data_add->cate_id = 1;
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
