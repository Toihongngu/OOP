@extends('layouts.master')

@section('title')
    Danh sách categories
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
                                    <h3 class="m-0">List Categories</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>CATEGORIES</h4>
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
                                            <a href="{{ url('admin/categories/create') }}" data-bs-toggle="modal"
                                                data-bs-target="#addcategory" class="btn_1">Add New Category</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th cope="col">ID</th>
                                                <th cope="col">NAME</th>
                                                <th cope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $index => $category)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }} </th>
                                                    <td>{{ $category['name'] }}</td>
                                                    <td>
                                                        <a class="badge bg-info"
                                                            href="{{ url('admin/categories/' . $category['id'] . '/show') }}">Xem</a>
                                                        <a class="badge bg-warning"
                                                            href="{{ url('admin/categories/' . $category['id'] . '/edit') }}">Sửa</a>
                                                        <a class="badge bg-danger"
                                                            href="{{ url('admin/categories/' . $category['id'] . '/delete') }}"
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
