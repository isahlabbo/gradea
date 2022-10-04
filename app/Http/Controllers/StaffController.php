<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index',['staffs'=>User::where('role','staff')->get()]);
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
            'role'=>'staff',
            ]); 
        return redirect()->route('staff.index');       
    }

    public function update(Request $data, $staffId)
    {
        $data->validate([
            'name'=>'required|string',
            'gender'=>'required',
            'email'=>'required',
            'address'=>'required',
            ]);
        $staff = User::find($staffId);
        $staff->update([
            'name'=>$data->name,
            'gender'=>$data->gender,
            'email'=>$data->email,
            'address'=>$data->address,
            ]);
            if($data->password){
                $staff->update(['password'=>Hash::make($data->password)]);
            } 
        return redirect()->route('staff.index');  
    }

    public function delete($staffId)
    {
        User::find($staffId)->delete();
        return redirect()->route('staff.index');
    }
}
