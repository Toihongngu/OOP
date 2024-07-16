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
                                     <h3 class="m-0">Products </h3>
                                 </div>
                             </div>
                         </div>
                         <div class="white_card_body">
                             <div class="QA_section">
                                 <div class="white_box_tittle list_header">
                                     <h4>{{ $product['name'] }}</h4>
                                     <div class="box_right d-flex lms_block">
                                         <div class="add_button ms-2">
                                             <a href="{{ url('admin/products') }}" data-bs-toggle="modal"
                                                 data-bs-target="#addcategory" class="btn_1">Back</a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="QA_table mb_30">
                                     <table class="table  ">
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

                                             <tr>
                                                 <th scope="row">{{ $product['id'] }} </th>
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
                                                         foreach ($categories as $item) {
                                                             if ($item['id'] == $product['category_id']) {
                                                                 echo $item['name'];
                                                             }else{
                                                                echo 'none cate';
                                                             }
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
                                                     <a class="badge bg-warning"
                                                         href="{{ url('admin/products/' . $product['id'] . '/edit') }}">Sửa</a>
                                                     <a class="badge bg-danger"
                                                         href="{{ url('admin/products/' . $product['id'] . '/delete') }}"
                                                         onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>
                                                 </td>
                                             </tr>

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
