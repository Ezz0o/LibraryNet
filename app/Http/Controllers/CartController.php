<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Book;
use App\Models\Cart;
use App\Models\CartBook;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        return view('user.cart', ['books' => $cart->books]);
    }

    public function purchase()
    {
        $cart = Cart::where('user_id', auth()->user()->cart->user_id)->first();
        $total = 0;
        foreach($cart->books as $book)
        {
            $total += $book->price;
        }
        $shippingfee = 50;
        
        $total += $shippingfee;
        return view('user.purchase', ['books' => $cart->books, 'shippingfee' => $shippingfee ,'total' => $total]);
    }

    public function successPurchase()
    {
        $cart = Cart::where('user_id', auth()->user()->cart->user_id)->first();
        foreach($cart->books as $book)
        {
            $cart->books()->detach($book->id);
        }
        return view('purchase-success');
    }

    public function store($bookid)
    {
        // find user cart
        $cart = Cart::where('user_id', auth()->id())->first();
        //query books in user cart
        $unique = CartBook::where('book_id', $bookid)->where('cart_id', $cart->id)->first(); 
        
        //if book not in cart
        if($unique == null)
        {
            //add book to user cart
            $book = Book::find($bookid);
            CartBook::create(['cart_id' => $cart->id, 'book_id' => $book->id]);
            return back()->with('message', 'item added to cart');
        }
        //else don't add
        return back()->with('message', 'This item is already in your cart');
    }

    public function destroy($bookid)
    { 
        $cart = Cart::where('user_id', auth()->id())->first();
        //detach book from user cart
        $cart->books()->detach($bookid);

        return back()->with('message', 'book removed from cart');
    }
}
