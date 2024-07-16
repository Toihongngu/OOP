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
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Checkout</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Checkout Start -->
        <form action="{{ url('order/checkout') }}" method="POST">
            <div class="container-fluid pt-5">
                <div class="row px-xl-5">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name"
                                        value="{{ $_SESSION['user']['name'] ?? null }}" placeholder="Enter name"
                                        name="user_name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" id="email"
                                        value="{{ $_SESSION['user']['email'] ?? null }}" placeholder="Enter email"
                                        name="user_email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label> Phone</label>
                                    <input type="text" class="form-control" id="phone"
                                        value="{{ $_SESSION['user']['phone'] ?? null }}" placeholder="Enter phone"
                                        name="user_phone">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="address"
                                        value="{{ $_SESSION['user']['address'] ?? null }}" placeholder="Enter address"
                                        name="user_address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Products</h5>
                                @php
                                    $cartKey = 'cart';
                                    if (isset($_SESSION['user'])) {
                                        $cartKey .= '-' . $_SESSION['user']['id'];
                                    }
                                    $cart = $_SESSION[$cartKey] ?? [];
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($cart as $item)
                                    <div class="d-flex justify-content-between">
                                        <p> {{ $item['name'] }}</p>
                                        <p>${{ $item['price_sale'] ?: $item['price_regular'] }}</p>
                                        <p> {{ $item['quantity'] }}</p>
                                        @php
                                        $totalPrice += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
                                        @endphp
                                    </div>
                                @endforeach
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    @php
                                     
                                    @endphp
                                    <h6 class="font-weight-medium">${{  $totalPrice }}</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">$10</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">${{  $totalPrice + 10}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">                             
                                <div class="">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                        <label class="custom-control-label" for="banktransfer">Pay cash upon receipt ...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Checkout End -->
    @endsection
