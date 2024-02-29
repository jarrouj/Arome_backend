<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function show_customer(){

        $customer = Customer::latest()->paginate(10);

        return view('admin.customer.show_customer',compact('customer'));


    }

    public function add_customer(Request $request){

        $customer = new Customer;

        $logo = $request->logo;


        if($logo)
        {
            $logoname = Str::random(20) . '.' . $logo->getClientOriginalExtension();

            //Save the original image
            $request->logo->move('customer', $logoname);

            //change the image quality using Intervention Image
            $logo = Image::make(public_path('customer/' . $logoname));

            $logo->encode($logo->extension, 10)->save(public_path('customer/' . $logoname));

            $customer->logo = $logoname;
        }

        $customer->save();

        return redirect()->back()->with('message', 'Customer Added');
    }

    public function delete_customer($id){

        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->back()->with('message', 'Customer Deleted');

    }
}
