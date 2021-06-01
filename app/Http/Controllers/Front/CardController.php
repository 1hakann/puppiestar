<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Card;

class CardController extends Controller
{
    public function addToCard(Product $product)
    {
        if(session()->has('card'))
        {
            $card = new Card(session()->get('card'));
        } else {
            $card = new Card();
        }
        $card->add($product);

        session()->put('card',$card);
        notify()->success('Ürün Sepete Eklendi ⚡️');
        return redirect()->back();
    }

    public function cardshow()
    {
        if(session()->has('card'))
        {
            $card = new Card(session()->get('card'));
        } else {
            $card = null;
        }
        return view('front.product.card',compact('card'));
    }

    public function cardupdate(Request $request, Product $product)
    {
        $this->validate($request,[
            'qty' => 'required|numeric|min:1'
        ]);

        $card = new Card(session()->get('card'));
        $card -> updateQty($product->id,$request->qty);
        session()->put('card',$card);
        notify()->success('Ürün Miktarı Güncellendi ⚡️');
        return redirect()->back();
    }

    public function cardremove(Product $product)
    {
        $card = new Card(session()->get('card'));
        $card -> remove($product->id);
        if($card->totalQty<=0)
        {
            session()->get('card');
        } else {
            session()->put('card',$card);
        }
        notify()->success('Your Shopping Cart Updated ⚡️');
        return redirect()->back();
    }

}
