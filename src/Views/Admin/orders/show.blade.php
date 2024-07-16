 @extends('layouts.master')

 @section('title')
     Danh sách order
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
                                     <h3 class="m-0">Categories </h3>
                                 </div>
                             </div>
                         </div>
                         <div class="white_card_body">
                             <div class="QA_section">
                                 <div class="white_box_tittle list_header">
                                     <h4>{{ $category['name'] }}</h4>
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
                                         <div class="add_button ms-2">
                                             <a href="{{ url('admin/categories') }}" data-bs-toggle="modal"
                                                 data-bs-target="#addcategory" class="btn_1">Back</a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="QA_table mb_30">
                                     <table class="table  ">
                                         <thead>
                                             <tr>
                                                 <th cope="col">ID</th>
                                                 <th cope="col">USER NAME</th>
                                                 <th cope="col">USER EMAIL</th>
                                                 <th cope="col">USER PHONE</th>
                                                 <th cope="col">USER ADDRESS</th>
                                                 <th cope="col">DELIVERY</th>
                                                 <th cope="col">DELIVERY action</th>
                                                 <th cope="col">PAY MENT</th>
                                                 <th cope="col">PAY MENT action</th>
                                                 <th cope="col">CREATE AT</th>
                                             </tr>
                                         </thead>
                                         <tbody>

                                             <tr>
                                                 <th scope="row">{{ $order['id'] }} </th>
                                                 <td>{{ $order['user_name'] }}</td>
                                                 <td>{{ $order['user_email'] }}</td>
                                                 <td>{{ $order['user_phone'] }}</td>
                                                 <td>{{ $order['user_address'] }}</td>
                                                 <form action="{{ url('admin/orders/'.$order['id'].'/delivery') }}" method="POST">
                                                     <td>

                                                         <select class="form-select" id="inputGroupSelect01"
                                                             name="status_delivery">
                                                             <option @if ($order['status_delivery'] == 0) selected @endif
                                                                 value=" 0">0</option>
                                                             <option @if ($order['status_delivery'] == 1) selected @endif
                                                                 value="1">1</option>
                                                             <option @if ($order['status_delivery'] == 2) selected @endif
                                                                 value="2">2</option>
                                                             <option @if ($order['status_delivery'] == 3) selected @endif
                                                                 value="3">3</option>
                                                             <option @if ($order['status_delivery'] == 4) selected @endif
                                                                 value="4">4</option>
                                                             <option @if ($order['status_delivery'] == 5) selected @endif
                                                                 value="5">5</option>
                                                         </select>
                                                     </td>
                                                     <td>
                                                         <button class="btn btn-success " type="submit">submit</button>

                                                     </td>
                                                 </form>
                                                 <form action="{{ url('admin/orders/'.$order['id'].'/payment') }}" method="POST">
                                                     <td>

                                                         <select class="form-select" id="inputGroupSelect01"
                                                             name="status_payment">
                                                             <option @if ($order['status_payment'] == 0) selected @endif
                                                                 value=" 0">0</option>
                                                             <option @if ($order['status_payment'] == 1) selected @endif
                                                                 value="1">1</option>
                                                         </select>
                                                     </td>
                                                     <td>
                                                         <button class="btn btn-success" type="submit">submit</button>

                                                     </td>
                                                 </form>
                                                 <td>{{ $order['created_at'] }}</td>
                                             </tr>

                                         </tbody>

                                         <thead>
                                             <tr>
                                                 <th cope="col">PRODUCT IMG</th>
                                                 <th cope="col">PRODUCT NAME</th>
                                                 <th cope="col">QUANTITY</th>
                                                 <th cope="col">PRICE</th>
                                                 <th cope="col">TOTAL</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ($orderDetailProducts as $item)
                                                 <tr>
                                                     <td>
                                                         <img src="{{ asset($item['img_thumbnail']) }}" alt=""
                                                             width="100px">
                                                     </td>
                                                     <th scope="row">{{ $item['name'] }} </th>
                                                     <td>{{ $item['quantity'] }}</td>
                                                     <td>{{ $item['price_sale'] ?? $item['price_regular'] }}</td>
                                                     <td>{{ $item['quantity'] * ($item['price_sale'] ?? $item['price_regular']) }}
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
