<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

class OrderItemController extends Controller
{
    public function index($customerId, $orderId)
    {
        return view('customer.order.item.index',['order'=>Order::find($orderId)]);
    }

    public function update(Request $request, $customerId, $orderId, $itemId)
    {
        $request->validate(['quantity'=>'required|integer']);
        $item = OrderItem::find($itemId);
        $item->update(['quantity'=>$request->quantity]);
        $item->order->updateAmount();
        return redirect()->route('customer.order.item.index',[$customerId, $orderId]);
    }

    
}
