<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UsertestController extends Controller
{
    public function index(){
    	$data = User::all()->tojson();
        return $data;
    }
    public function show($id){
    	$data = User::find($id)->tojson();
        return $data;
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass);
        $user->remember_token = $request->_token;
        $user->save();
        return response()->json([
            'status' => 'Thêm dữ liệu thành công!!!'
        ]);

    }
    public function update(Request $request,$id){
        $item_edit = User::find($id);
    	if($request->txtPass){
            $item_edit->password = Hash::make($request->txtPass);
        }
        if($request->txtName){
            $item_edit->name = $request->txtName;
        }
        if($request->txtEmail){
            $item_edit->email = $request->txtEmail;
        }
        $item_edit->save();
        return response()->json([
            'status' => 'Update thành công!!!'
        ]);
    }
    public function delete($id){
    	$item_del = User::find($id);
        $item_del->delete();
        return response()->json([
            'status' => 'Delete thành công!!!'
        ]);
    }
}
