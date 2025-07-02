<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;

class MenuController extends Controller
{
        public function index()
    {
        $categories = ['prasmanan', 'paketan', 'minuman', 'topping'];
        $previews = MenuItem::inRandomOrder()->take(36)->get();
        $bestsellers = MenuItem::orderByDesc('order_count')->take(5)->get();

        return view('index', compact('categories', 'previews', 'bestsellers'));
    }

        public function category($category)
    {
        $items = MenuItem::where('category', $category)->get();

        return view('category', compact('items', 'category'));
    }


    public function addToCart(Request $request)
    {
        $menuItem = MenuItem::findOrFail($request->item_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$menuItem->id])) {
            $cart[$menuItem->id]['quantity'] += 1;
            $cart[$menuItem->id]['subtotal'] = $cart[$menuItem->id]['quantity'] * $cart[$menuItem->id]['item']['price'];
        } else {
            $cart[$menuItem->id] = [
                'item' => [
                    'id' => $menuItem->id,
                    'name' => $menuItem->name,
                    'price' => $menuItem->price,
                ],
                'quantity' => 1,
                'subtotal' => $menuItem->price,
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', $menuItem->name . ' ditambahkan ke keranjang.');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $entry) {
            $items[] = [
                'item' => (object) $entry['item'],
                'quantity' => $entry['quantity'],
                'subtotal' => $entry['subtotal'],
            ];
            $total += $entry['subtotal'];
        }

        return view('cart', compact('items', 'total'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $entry) {
            $items[] = [
                'item' => (object) $entry['item'],
                'quantity' => $entry['quantity'],
                'subtotal' => $entry['subtotal'],
            ];
            $total += $entry['subtotal'];
        }

        return view('checkout', compact('items', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Keranjang kosong.');
        }

        $total = 0;
        $items = [];

        foreach ($cart as $id => $entry) {
            if (!is_array($entry) || !isset($entry['item']['id'], $entry['item']['name'], $entry['item']['price'], $entry['quantity'], $entry['subtotal'])) {
                continue;
            }

            $total += $entry['subtotal'];
            $items[] = [
                'id' => $entry['item']['id'],
                'name' => $entry['item']['name'],
                'quantity' => $entry['quantity'],
                'subtotal' => $entry['subtotal'],
            ];

            $menuItem = MenuItem::find($entry['item']['id']);
            if ($menuItem) {
                $menuItem->increment('order_count', $entry['quantity']);
            }
        }

        $request->validate([
            'customer_name' => 'required',
            'payment_method' => 'required',
        ]);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'payment_method' => $request->payment_method,
            'items' => json_encode($items),
            'total_price' => $total,
        ]);

        session()->forget('cart');

        // Store name and total in session for thank you page
        session([
            'checkout_name' => $request->customer_name,
            'checkout_total' => $total,
        ]);

        // Redirect to appropriate thank you page
        if ($request->payment_method === 'kasir') {
            return redirect()->route('thankyou.kasir');
        } elseif ($request->payment_method === 'qris') {
            return redirect()->route('thankyou.qris');
        }

        return redirect('/');
    }

    public function thankyouKasir()
    {
        $customer_name = session('checkout_name');
        $total_price = session('checkout_total');
        return view('thankyou_kasir', compact('customer_name', 'total_price'));
    }

public function thankyouQris()
    {
        $customer_name = session('checkout_name');
        $total_price = session('checkout_total');
        return view('thankyou_qris', compact('customer_name', 'total_price'));
    }

    public function increaseQuantity(Request $request)
{
    $cart = session()->get('cart', []);
    $id = $request->id;

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += 1;
        $cart[$id]['subtotal'] = $cart[$id]['quantity'] * $cart[$id]['item']['price'];
        session()->put('cart', $cart);
    }

    return redirect()->back();
}

public function decreaseQuantity(Request $request)
{
    $cart = session()->get('cart', []);
    $id = $request->id;

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] -= 1;

        if ($cart[$id]['quantity'] <= 0) {
            unset($cart[$id]); // remove from cart
        } else {
            $cart[$id]['subtotal'] = $cart[$id]['quantity'] * $cart[$id]['item']['price'];
        }

        session()->put('cart', $cart);
    }

    return redirect()->back();
}

}

