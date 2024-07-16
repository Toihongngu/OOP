 @extends('layouts.master')

 @section('title')
     Danh sách Categories
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
                                                 <th cope="col">NAME</th>
                                                 <th cope="col">ACTION</th>
                                             </tr>
                                         </thead>
                                         <tbody>

                                             <tr>
                                                 <th scope="row">{{ $category['id'] }} </th>                                               
                                                 <td>{{ $category['name'] }}</td>                                           
                                                 <td>                                              
                                                     <a class="badge bg-warning"
                                                         href="{{ url('admin/categories/' . $category['id'] . '/edit') }}">Sửa</a>
                                                     <a class="badge bg-danger"
                                                         href="{{ url('admin/categories/' . $category['id'] . '/delete') }}"
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
