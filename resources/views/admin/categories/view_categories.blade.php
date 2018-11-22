@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Admin Categories</a> </div>
    <h1>
      Admin Categories
      <span>
        <a href="{{ url('admin/add-category/') }}" class="btn btn-primary tip-bottom pull-right addbutton" title="Add Category"><i class="icon-plus-sign"></i> <span>Add Category</span></a>
      </span>
    </h1>
  </div>
  <!--End-Breadcrumbs-->
  
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Category &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Icon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->category }}</td>
                  <td>
                    <img src="{{ asset('backend_files/img/categories/small/'.$category->image) }}" style="width: 80px;">
                  </td>
                  <td>
                    <a href="{{ url('admin/edit-category/'.$category->id) }}" class="btn btn-warning btn-mini tip-bottom" title="Edit Category">Edit</a>

                    <a href="#myModal{{ $category->id }}" data-toggle="modal" class="btn btn-success btn-mini tip-bottom" title="View Category">View</a>
                    
                    <!-- <a href="{{ url('admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-mini tip-bottom" title="Delete Category">Delete</a> -->

                    <a rel="{{ $category->id }}" rel1="delete-category" href="javascript:" class="btn btn-danger btn-mini tip-bottom deleteRecord" title="Delete Category">Delete</a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $category->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>Full Details</center></h3>
                  </div>
                  <div class="modal-body">
                    
                     <div class="row">
                      <div class="mycolumn">
                        <p><b>Category ID :</b></p>
                        <p><b>Category :</b></p>
                      </div>
                      <div class="mycolumn">
                        <p>{{ $category->id }}</p>
                        <p>{{ $category->category }}</p>
                      </div>
                    </div>

                  </div>
                </div>
                <!--End-Modal-->
                
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End-Content-->

@endsection