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
                            <form action="{{ url("admin/categories/{$category['id']}/update") }}" enctype="multipart/form-data"
                                method="POST">
                                <h6 class="card-subtitle mb-2">Edit category {{ $category['name'] }}</h6>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                        aria-describedby="basic-addon1" name="name" value="{{ $category['name'] }}">
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
