@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('setting-nav-autodrop')
    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
        id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
    @endsection

    @section('content')
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Shopping Cart</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
            <!-- Cart Start -->
            <div class="container-fluid pt-5">
                <div class="row px-xl-5">
                    <div class="col-lg-8 table-responsive mb-5">
                        <table class="table table-bordered text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @php
                                    $cartKey = 'cart';
                                    if (isset($_SESSION['user'])) {
                                        $cartKey .= '-' . $_SESSION['user']['id'];
                                    }
                                    $cart = $_SESSION[$cartKey] ?? [];
                                @endphp

                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="align-middle"><img src="{{ asset($item['img_thumbnail']) }}"
                                                alt="" style="width: 50px;"> {{ $item['name'] }}</td>
                                        <td class="align-middle">{{ $item['price_sale'] ?: $item['price_regular'] }}</td>
                                        <td class="align-middle">
                                            @php
                                                $decUrl = url('cart/quantityDec') . '?productID=' . $item['id'];
                                                $incUrl = url('cart/quantityInc') . '?productID=' . $item['id'];
                                                $removeUrl = url('cart/remove') . '?productID=' . $item['id'];

                                                if (isset($_SESSION['user'])) {
                                                    $decUrl .= '&cartID=' . $_SESSION['cart_id'];
                                                    $incUrl .= '&cartID=' . $_SESSION['cart_id'];
                                                    $removeUrl .= '&cartID=' . $_SESSION['cart_id'];
                                                }
                                            @endphp
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <a href="{{ $decUrl }}" class="btn btn-sm btn-primary btn-minus">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-sm bg-secondary text-center"
                                                    value="{{ $item['quantity'] }}">
                                                <div class="input-group-btn">
                                                    <a href="{{ $incUrl }}" class="btn btn-sm btn-primary btn-plus">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            {{ $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']) }}
                                        </td>
                                        <td class="align-middle">
                                            <a onclick="return confirm('Có chắn không?')" href="{{ $removeUrl }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-lg-4">
                        <form class="mb-5" action="">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Coupon Code">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Apply Coupon</button>
                                </div>
                            </div>
                        </form>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">$150</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">$10</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">$160</h5>
                                </div>
                                <a href="{{ url('order') }}" class="btn btn-block btn-primary my-3 py-3">Proceed To
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart End -->
        @endif
    @endsection
