@extends('layouts.master')

@section('title')
    Danh sách Products
@endsection

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">List Products</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>PRODUCTS</h4>
                                    <h6>
                                        @if (isset($_SESSION['status']) && $_SESSION['status'])
                                            <span class="badge bg-success">
                                                {{ $_SESSION['msg'] }}

                                            </span>
                                            @php
                                                unset($_SESSION['status']);
                                                unset($_SESSION['msg']);
                                            @endphp
                                        @endif
                                    </h6>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search by name ... ">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ms-2">
                                            <a href="{{ url('admin/products/create') }}" data-bs-toggle="modal"
                                                data-bs-target="#addcategory" class="btn_1">Add New Product</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th cope="col">ID</th>
                                                <th cope="col">IMAGE</th>
                                                <th cope="col">NAME</th>
                                                <th cope="col">CATEGORY</th>
                                                <th cope="col">PRICE</th>
                                                <th cope="col">SALE</th>
                                                <th cope="col">OVERVIEW</th>
                                                <th cope="col">CONTENT</th>
                                                <th cope="col">CREATED AT</th>
                                                <th cope="col">UPDATED AT</th>
                                                <th cope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $index => $product)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }} </th>
                                                    <td>
                                                        @if ($product['img_thumbnail'])
                                                            <img src="{{ asset($product['img_thumbnail']) }}" alt=""
                                                                width="100px">
                                                        @else
                                                            No Image data
                                                        @endif
                                                    </td>
                                                    <td>{{ $product['name'] }}</td>
                                                    <td>
                                                        @php
                                                            $check = true;
                                                            foreach ($categories as $item) {
                                                                
                                                                if ($item['id'] == $product['category_id']) {
                                                                    echo $item['name']; $check = false ;
                                                                }
                                                            }

                                                            if ($check) {
                                                               echo '<p class="badge bg-warning">none cate</p>';
                                                            }
                                                        @endphp


                                                    </td>
                                                    <td>{{ $product['price_regular'] }}</td>
                                                    <td>{{ $product['price_sale'] }}</td>
                                                    <td>{{ $product['overview'] }}</td>
                                                    <td>{{ $product['content'] }}</td>
                                                    <td>{{ $product['created_at'] }}</td>
                                                    <td>{{ $product['updated_at'] }}</td>
                                                    <td>
                                                        <a class="badge bg-info"
                                                            href="{{ url('admin/products/' . $product['id'] . '/show') }}">Xem</a>
                                                        <a class="badge bg-warning"
                                                            href="{{ url('admin/products/' . $product['id'] . '/edit') }}">Sửa</a>
                                                        <a class="badge bg-danger"
                                                            href="{{ url('admin/products/' . $product['id'] . '/delete') }}"
                                                            onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
@endsection
