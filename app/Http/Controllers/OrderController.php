<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function register(Request $request,$customerId)
    {
        $customer = User::find($customerId)->customer;
        $order = $customer->orders()->create(['amount'=>'0']);
        $amount = 0;
        foreach($request->all() as $key => $value){
            if($product = Product::find($key)){
                $amount += $product->customerPrice($customer);
                $order->orderItems()->create(['product_id'=>$product->id]);
            }
        }
        $order->update(['amount'=>$amount]);
        return redirect()->route('dashboard')->withSuccess('Order Placed');
    }

    public function update(Request $request, $customerId, $orderId)
    {
        $request->validate([
            'payment'=>'required',
            'delivery'=>'required',
            ]);

        $order = Order::find($orderId);
        $order->update([
            'payment_method_id'=>$request->payment,
            'delivery_id'=>$request->delivery,
            ]);
        return redirect()->route('customer.order.item.index',[$customerId, $orderId]);
    }
}
