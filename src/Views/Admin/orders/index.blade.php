@extends('layouts.master')

@section('title')
    Danh sách Order detail
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
                                    <h3 class="m-0">List Order detail</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4> Order detail</h4>
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
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th cope="col">ID</th>
                                                <th cope="col">USER NAME</th>
                                                <th cope="col">USER EMAIL</th>
                                                <th cope="col">USER PHONE</th>
                                                <th cope="col">USER ADDRESS</th>
                                                <th cope="col">DELIVERY</th>
                                                <th cope="col">PAY MENT</th>
                                                <th cope="col">CREATE AT</th>
                                                <th cope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $index => $order)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }} </th>
                                                    <td>{{ $order['user_name'] }}</td>
                                                    <td>{{ $order['user_email'] }}</td>
                                                    <td>{{ $order['user_phone'] }}</td>
                                                    <td>{{ $order['user_address'] }}</td>
                                                    <td>{{ $order['status_delivery'] }}</td>
                                                    <td>{{ $order['status_payment'] }}</td>
                                                    <td>{{ $order['created_at'] }}</td>
                                                    <td>
                                                        <a class="badge bg-info"
                                                            href="{{ url('admin/orders/' . $order['id'] . '/show') }}">Xem</a>
                                                        <a class="badge bg-warning"
                                                            href="{{ url('admin/orders/' . $order['id'] . '/edit') }}">Sửa</a>
                                                        <a class="badge bg-danger"
                                                            href="{{ url('admin/orders/' . $order['id'] . '/delete') }}"
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
