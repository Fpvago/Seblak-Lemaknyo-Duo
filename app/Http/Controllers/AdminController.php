<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::latest()->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function markAsComplete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->save();

        return redirect()->route('admin.dashboard')->with('success', 'Pesanan ditandai selesai.');
    }
}
