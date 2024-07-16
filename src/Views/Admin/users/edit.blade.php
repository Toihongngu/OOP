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
                            <form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data"
                                method="POST">
                                <h6 class="card-subtitle mb-2">Edit User {{ $user['name'] }}</h6>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                        aria-describedby="basic-addon1" name="name" value="{{ $user['name'] }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Email</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Username"
                                        placeholder="Enter email" aria-describedby="basic-addon1"
                                        value="{{ $user['email'] }}" name="email">
                                </div>

                                @if ($user['avatar'])
                                    <div class="input-group mb-3">
                                        <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                    </div>
                                @endif

                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="avatar">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Type</label>
                                    <select class="form-select" id="inputGroupSelect01" name="type">                            
                                        <option @if ($user['type']=='member')
                                        selected
                                        @endif value="member">member</option>
                                        <option @if ($user['type']=='admin')
                                        selected
                                        @endif  value="admin">admin</option>                                   
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Password</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Password" aria-label="Username"
                                        aria-describedby="basic-addon1" name="password">
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
