<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use App\Models\shop;
use App\Models\transaction;
use App\Models\transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request,$id)
    {
        $search = Cart::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $id)->first();

        $data= product::find($id);
        if ($search == null) {
            Cart::create([
                'quantity' => $request->quantity,
                'product_id' => $data['id'],
                'user_id' => auth()->user()->id,
                'shop_id'=>$data->getShop->id,
            ]);
        } else {
            $currCart = $search;
            $currCart->quantity += $request->quantity;
            $currCart->save();
        }

        return redirect('/');
    }
    public function index()
    {

        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('cart', compact('data', 'cartdata'));
    }
    public function updatecart(Request $request, $id)
    {
        if ($request->quantity != '0') {
            $cart = Cart::find($id);
            $cart->quantity = $request->quantity;
            $cart->save();
        } else {
            Cart::find($id)->delete();
        }
        return back();
    }
    public function deletecart($id)
    {
        Cart::where('id', '=', $id)->first()->delete();
        return back();
    }
    public function checkout()
    {
        $data = Cart::where('user_id', '=', auth()->user()->id)->get();

        $transactions = new transaction();
        $transactions->user_id = auth()->user()->id;
        $transactions->save();
        for ($i = 0; $i < count($data); $i++) {
            $product = product::find($data[$i]->product_id);
            $product->stock = $product->stock - $data[$i]->quantity;
            $product->save();
            transaction_detail::create([
                'name' => $data[$i]->name,
                'price' => $data[$i]->price,
                'quantity' => $data[$i]->quantity,
                'product_id' => $data[$i]->product_id,
                'shop_id'=> $data[$i]->shop_id,
                'user_id' => auth()->user()->id,
                'transaction_id' => $transactions->id
            ]);
        }

        Cart::where('user_id', '=', auth()->user()->id)->delete();
        return redirect('/');
    }
    public function transactionhistory()
    {    $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        $data = transaction::where('user_id', '=', auth()->user()->id)->get();
        return view('transactionhistory', compact('data','cartdata'));
    }
    public function transactiondetail($id)
    {
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        $data = transaction_detail::where('transaction_id', '=', $id)->get();
        return view('transactiondetail', compact('data','cartdata'));
    }
}
