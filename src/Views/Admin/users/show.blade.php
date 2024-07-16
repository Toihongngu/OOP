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
                                     <h3 class="m-0">User </h3>
                                 </div>
                             </div>
                         </div>
                         <div class="white_card_body">
                             <div class="QA_section">
                                 <div class="white_box_tittle list_header">
                                     <h4>{{ $user['name'] }}</h4>
                                     <div class="box_right d-flex lms_block">                                     
                                        <div class="add_button ms-2">
                                            <a href="{{ url('admin/users') }}" data-bs-toggle="modal"
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
                                                 <th cope="col">EMAIL</th>
                                                 <th cope="col">TYPE</th>
                                                 <th cope="col">CREATED AT</th>
                                                 <th cope="col">UPDATED AT</th>
                                                 <th cope="col">IS ACTIVE</th>
                                                 <th cope="col">ACTION</th>
                                             </tr>
                                         </thead>
                                         <tbody>


                                             <tr>
                                                 <th scope="row">{{ $user['id'] }} </th>
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
                                                 <td><?= $user['is_active'] ?></td>
                                                 <td>                                                  
                                                     <a class="badge bg-warning"
                                                         href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                                     <a class="badge bg-danger"
                                                         href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
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
