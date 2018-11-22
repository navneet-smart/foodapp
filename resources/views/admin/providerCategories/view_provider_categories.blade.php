@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Provider Categories</a> </div>
    <h1>Provider Categories</h1>
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
                  <th>Truck ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Food Truck &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Banner</th>
                  <th>Category &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($provider_categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->f_id }}</td>
                  <td>{{ $category->food_truck->display_name }}</td>
                  <td>
                    @if(empty($category->banner->image))
                    <img src="{{ asset('backend_files/img/no-banner.png') }}" class="banner_size">
                    @else
                    <img src="{{ asset('backend_files/img/banners/large/'.$category->banner->image) }}" class="banner_size">
                    @endif
                  </td>
                  <td>{{ $category->category }}</td>
                  <td>
                    <a href="{{ url('admin/edit-provider-category/'.$category->id) }}" class="btn btn-warning btn-mini tip-bottom" title="Edit Provider Category">Edit</a>

                    <a href="#myModal{{ $category->id }}" data-toggle="modal" class="btn btn-success btn-mini tip-bottom" title="View Provider Category">View</a>

                    <!-- <a href="{{ url('admin/delete-provider-category/'.$category->id) }}" class="btn btn-danger btn-mini tip-bottom" title="Delete Provider Category">Delete</a> -->
                    
                    <a rel="{{ $category->id }}" rel1="delete-provider-category" href="javascript:" class="btn btn-danger btn-mini tip-bottom deleteRecord" title="Delete Provider Category">Delete</a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $category->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>Full Details</center></h3>
                  </div>
                  <div class="modal-body">

                    <center>
                      @if(empty($category->banner->image))
                      <img src="{{ asset('backend_files/img/no-banner.png') }}" class="banner_modal">
                      @else
                      <img src="{{ asset('backend_files/img/banners/large/'.$category->banner->image) }}" class="banner_modal">
                      @endif
                    </center><hr>
                    
                    <div class="row">
                      <div class="mycolumn">
                        <p><b>Category ID :</b></p>
                        <p><b>Truck ID :</b></p>
                        <p><b>Truck Name :</b></p>
                        <p><b>Category :</b></p>
                      </div>
                      <div class="mycolumn">
                        <p>{{ $category->id }}</p>
                        <p>{{ $category->f_id }}</p>
                        <p>{{ $category->food_truck->display_name }}</p>
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