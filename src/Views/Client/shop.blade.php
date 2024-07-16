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
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop @foreach ($categories as $category)
                        @php
                            if ($category['id'] == $_GET['cate']) {
                                echo '-' . $category['name'];
                            }
                        @endphp
                    @endforeach
                </h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Shop</p>


                    @foreach ($categories as $category)
                        @php
                            if ($category['id'] == $_GET['cate']) {
                                echo ' <p class="m-0 px-2">-</p> <p class="m-0">' . $category['name'] . ' </p>';
                            }
                        @endphp
                    @endforeach



                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Shop Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">


                <!-- Shop Product Start -->
                <div class="col-lg-12 col-md-12">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <form action="{{ url('shop') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search by name">
                                        <input type="hidden" name="page" value="{{ $_GET['page'] }}">
                                        <input type="hidden" name="cate" value="{{ $_GET['cate'] }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="dropdown ml-4">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ asset($product['img_thumbnail']) }}"
                                            alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ $product['name'] }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>${{ $product['price_sale'] ?: $product['price_regular'] }}</h6>
                                            <h6 class="text-muted ml-2"><del>
                                                    @if ($product['price_sale'] != null && $product['price_sale'] > 0)
                                                        ${{ $product['price_regular'] }}
                                                    @endif
                                                </del></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ url('products/' . $product['id']) }}"
                                            class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                        <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}"
                                            class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                    <li class="page-item @if ($_GET['page'] == 1) disabled @endif">
                                        <a class="page-link"
                                            href="{{ $_GET['page'] > 1 ? 'http://oop.test/shop?search=' . ($_GET['search'] ?? '') . '&cate=' . ($_GET['cate'] ?? '') . '&page=' . ($_GET['page'] - 1) : '#' }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $totalPage; $i++)
                                        <li class="page-item @if ($i == $_GET['page']) active @endif">
                                            <a class="page-link"
                                                href="http://oop.test/shop?search={{ $_GET['search'] ?? '' }}&cate={{ $_GET['cate'] ?? '' }}&page={{ $i }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item @if ($_GET['page'] == $totalPage) disabled @endif">
                                        <a class="page-link"
                                            href="{{ $_GET['page'] < $totalPage ? 'http://oop.test/shop?search=' . ($_GET['search'] ?? '') . '&cate=' . ($_GET['cate'] ?? '') . '&page=' . ($_GET['page'] + 1) : '#' }}"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <!-- Shop Product End -->
            </div>
        </div>
        <!-- Shop End -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const prevPageLink = document.querySelector('a[aria-label="Previous"]');
                const nextPageLink = document.querySelector('a[aria-label="Next"]');

                if (prevPageLink) {
                    prevPageLink.addEventListener('click', function(event) {
                        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

                        let currentPage = parseInt('{{ $_GET['page'] ?? 1 }}');
                        let prevPage = currentPage - 1;
                        let cate = '{{ $_GET['cate'] ?? 0 }}';
                        let search = '{{ $_GET['search'] ?? '' }}';

                        if (prevPage >= 1) {
                            prevPageLink.setAttribute('href',
                                `http://oop.test/shop?search=${search}&cate=${cate}&page=${prevPage}`);
                            // Điều hướng người dùng đến trang trước
                            window.location.href =
                                `http://oop.test/shop?search=${search}&cate=${cate}&page=${prevPage}`;
                        } else {
                            prevPageLink.setAttribute('href',
                            '#'); // Nếu không có trang trước đó, tạm thời disable link
                        }
                    });
                }

                if (nextPageLink) {
                    nextPageLink.addEventListener('click', function(event) {
                        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

                        let currentPage = parseInt('{{ $_GET['page'] ?? 1 }}');
                        let nextPage = currentPage + 1;
                        let cate = '{{ $_GET['cate'] ?? 0 }}';
                        let search = '{{ $_GET['search'] ?? '' }}';

                        if (nextPage <= {{ $totalPage }}) {
                            nextPageLink.setAttribute('href',
                                `http://oop.test/shop?search=${search}&cate=${cate}&page=${nextPage}`);
                            // Điều hướng người dùng đến trang tiếp theo
                            window.location.href =
                                `http://oop.test/shop?search=${search}&cate=${cate}&page=${nextPage}`;
                        } else {
                            nextPageLink.setAttribute('href',
                            '#'); // Nếu không có trang tiếp theo, tạm thời disable link
                        }
                    });
                }
            });
        </script>
    @endsection
