<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLoginModel;

class CustomerController extends Controller
{
    public function addCustomer(){

        return view("customerRegister");
    }

    public function storeCustomer(Request $request){
        
        $customer = new CustomerLoginModel;

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;


        $customer->save();

        return redirect()->route("manageCustomer");
        
    }

    public function manageCustomer()
    {
        $customers = CustomerLoginModel::all();
       return view("customerManage",compact("customers"));
    }

    public function editCustomer($id){

        $customer = CustomerLoginModel::find($id);
        return view("customerEdit",compact("customer"));
    }

    public function updateCustomer(Request $request, $id){

        $customer = CustomerLoginModel::find($id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        $customer->update();
        return redirect()->route("manageCustomer");
        
    }


    public function deleteCustomer($id){

        $customer = CustomerLoginModel::find($id);

        $customer->delete();
        
        return redirect()->route("manageCustomer");
        
    }
}
