@extends('layouts.master')

@section('title')
    Danh sách User
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
                                    <h3 class="m-0">List Users</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>USERS</h4>
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
                                                        <input type="text" placeholder="Search by email ... ">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ms-2">
                                            <a href="{{ url('admin/users/create') }}" data-bs-toggle="modal"
                                                data-bs-target="#addcategory" class="btn_1">Add New User</a>
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
                                                <th cope="col">EMAIL</th>
                                                <th cope="col">TYPE</th>
                                                <th cope="col">CREATED AT</th>
                                                <th cope="col">UPDATED AT</th>
                                                <th cope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }} </th>
                                                    <td>
                                                        @if ($user['avatar'])
                                                           <img src="{{ asset($user['avatar']) }}" alt=""
                                                            width="100px">  
                                                        @else
                                                            No Image data
                                                        @endif
                                                        </td>
                                                    <td><?= $user['name'] ?></td>
                                                    <td><?= $user['email'] ?></td>
                                                    <td><?= $user['type'] ?></td>
                                                    <td><?= $user['created_at'] ?></td>
                                                    <td><?= $user['updated_at'] ?></td>
                                                    <td>
                                                        <a class="badge bg-info"
                                                            href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                                        <a class="badge bg-warning"
                                                            href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                                        <a class="badge bg-danger"
                                                            href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
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
