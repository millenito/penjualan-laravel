<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transactionDetail;
use App\Models\transactionHeader;
use App\Models\User;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart.list', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function saveCart()
    {
        $auth_user = auth()->user();
        $items = \Cart::getContent();

        $lastId = transactionHeader::select('id')->orderBy('id','desc')->first();
        $no = str_pad((string) empty($lastId)? 0 : $lastId->id,3,"0",STR_PAD_LEFT);
        $doc_number = ((int) $no) + 1;

        DB::beginTransaction();

        $tx_header = new transactionHeader;
        $tx_header->document_code = 'TRX';
        $tx_header->document_number = $doc_number;
        $tx_header->total = \Cart::getTotal();
        $tx_header->user = $auth_user->id;
        $tx_header->save();

        foreach($items as $row) {

            $tx_detail = new transactionDetail;
            $tx_detail->document_code = 'TRX';
            $tx_detail->document_number = $doc_number;
            $tx_detail->product_code = $row->id;
            $tx_detail->price = $row->price;
            $tx_detail->quantity = $row->quantity;
            $tx_detail->unit = 'PCS';
            $tx_detail->subtotal = (float) $row->price * $row->quantity;
            $tx_detail->currency = 'IDR';
            $tx_detail->save();
        }

        DB::commit();
        \Cart::clear();

        session()->flash('success', 'Thank You For Your Purchase!');

        return redirect()->route('cart.success')->with('tx_header', 'TRX - '.$doc_number);
    }

    public function successCart()
    {
        return view('cart.success');
    }
}
