@extends('layouts.master')

@section('title')
    Danh sách User
@endsection

@section('content')

    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Update</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data"
                                method="POST">
                                <h6 class="card-subtitle mb-2">Edit Product {{ $product['name'] }}</h6>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                        aria-describedby="basic-addon1" name="name" value="{{ $product['name'] }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Price</span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Username"
                                        placeholder="Enter price_regular" aria-describedby="basic-addon1"
                                        name="price_regular" value="{{ $product['price_regular'] }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Price SALE</span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Username"
                                        placeholder="Enter price sale" aria-describedby="basic-addon1" name="price_sale"
                                        value="{{ $product['price_sale'] }}">
                                </div>
                                @if ($product['img_thumbnail'])
                                    <div class="input-group mb-3">
                                        <img src="{{ asset($product['img_thumbnail']) }}" alt="" width="100px">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="img_thumbnail">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">overview</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="overview" aria-label="Username"
                                        aria-describedby="basic-addon1" name="overview" value="{{ $product['overview'] }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">content</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter content"
                                        aria-label="Username" aria-describedby="basic-addon1" name="content"
                                        value="{{ $product['content'] }}">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">category</label>
                                    <select class="form-select" id="inputGroupSelect01" name="category_id">
                                        <option selected value="">Pick Category?</option>
                                        @foreach ($categories as $item)
                                            <option @if ($item['id'] == $product['category_id']) selected @endif
                                                value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @if (!empty($_SESSION['errors']))
                                    <div class="input-group mb-3">
                                        <div class="alert alert-warning">
                                            <ul>
                                                @foreach ($_SESSION['errors'] as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>

                                            @php
                                                unset($_SESSION['errors']);
                                            @endphp
                                        </div>
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
