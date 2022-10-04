<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index',['customers'=>User::where('role','customer')->get()]);
    }

    public function register(Request $data)
    {
        
        $data->validate([
            'name'=>'required|string',
            'gender'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'address'=>'required',
        ]);
        User::create([
            'name'=>$data->name,
            'gender'=>$data->gender,
            'email'=>$data->email,
            'password'=>Hash::make($data->password),
            'address'=>$data->address,
            'role'=>'customer',
            ]); 
        return redirect()->route('customer.index')->withSuccess('Customer Created');       
    }

    public function update(Request $data, $customerId)
    {
        $data->validate([
            'name'=>'required|string',
            'gender'=>'required',
            'email'=>'required',
            'address'=>'required',
            ]);
        $customer = User::find($customerId);
        $customer->update([
            'name'=>$data->name,
            'gender'=>$data->gender,
            'email'=>$data->email,
            'address'=>$data->address,
            ]);
            if($data->password){
                $customer->update(['password'=>Hash::make($data->password)]);
            } 
        return redirect()->route('customer.index')->withSuccess('Customer Updated');  
    }

    public function delete($customerId)
    {
        User::find($customerId)->delete();
        return redirect()->route('customer.index')->withSuccess('Customer Deleted');
    }
}
