<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLoginModel;
use App\Models\customerLogDetails;

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

    public function customerLogAdd(){

        return view("customerLogAdd");
    }

    public function customerLogStore(Request $request){
        
        $customer = new customerLogDetails;
        $customer->title = $request->title;
        $customer->name = $request->name;
        $customer->status = $request->status;
        $customer->comment = $request->comment;
        $customer->save();

        return redirect()->back()->withSuccess('Successfully Record Submitted!');
        
    }
    public function customerLogManageView()
    {
        $customers = customerLogDetails::all();
       return view("customerLogManagement",compact("customers"));
    }

    public function customerLogEdit($id){

        $customer = customerLogDetails::find($id);
        return view("customerLogEdit",compact("customer"));
    }

    public function customerLogUpdate(Request $request, $id){

        $customer = customerLogDetails::find($id);

        $customer->title = $request->title;
        $customer->name = $request->name;
        $customer->status = $request->status;
        $customer->comment = $request->comment;

        $customer->update();
        return redirect()->route("customerLogManageView")->withSuccess('Successfully Record Submitted!');
        
    }
    public function customerLogDelete($id){

        $customer = customerLogDetails::find($id);

        $customer->delete();
        return redirect()->route("customerLogManageView");
        
    }
    public function changeStatus(Request $request)
    {
        return 1;
        // $customer = customerLogDetails::find($id);
        // $customer->status = $request->status;
        // $customer->save();
  
        //return response()->json(['success'=>'Status change successfully.']);
    }
}
