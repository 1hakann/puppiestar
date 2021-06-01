@extends('front.layouts.master')

@section('content')
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="container">
                @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
                @endif
                </div>
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-1">#</th>
                                <th class="col-3">Image</th>
                                <th class="p-name col-2">Product Name</th>
                                <th class="col-2">Price</th>
                                <th class="col-2">Quantity</th>
                                <th class="col-1">Total</th>
                                <th><i class="ti-close col-1"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($card)
                            @php $i=1 @endphp
                            @foreach ($card->items as $product)
                            <tr>
                                <td class="cart-pic first-row col-1">{{$i++}}</td>
                                <td class="cart-pic first-row col-3"><img style="width:80%" src="{{Storage::url($product['image'])}}" alt=""></td>
                                <td class="cart-title first-row col-2">
                                    <h5>{{$product['name']}}</h5>
                                </td>
                                <td class="p-price first-row col-2">${{$product['price']}}</td>
                                <td class="qua-col first-row col-2">
                                <form action="{{route('card.update',$product['id'])}}" method="POST">
                                @csrf   
                                <div class="quantity">
                                    <div class="pro-qty">
                                    <input type="text" name="qty" value="{{$product['qty']}}">
                                    </div>
                                    <button type="submit" class="primary-btn up-cart"><i class="ti-reload"></i></button>
                                </form>
                                </div>
                                
                                   
                                </td>
                                <td clas="total-price first-row col-1">${{$product['price']}}</td>
                                <form action="{{route('card.remove',$product['id'])}}" method="POST">
                                @csrf
                                <td class="close-td first-row col-1"><button type="submit"><i class="ti-close"></i></button></td>
                                </form>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                        
                            
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                            <input type="submit" value="Update Cart" class="primary-btn up-cart">
                        
                        </div>
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                       
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>$240.00</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                        @else
                        <td>No Items in Cart</td>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection