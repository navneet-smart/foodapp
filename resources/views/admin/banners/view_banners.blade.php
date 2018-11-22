@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Banners</a> </div>
    <h1>Banners</h1>
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
                  <th>ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Truck ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>FoodTruck &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Banner</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($banners as $banner)
                <tr class="gradeX">
                  <td>{{ $banner->id }}</td>
                  <td>{{ $banner->f_id }}</td>
                  <td>{{ $banner->foodTruck_display_name }}</td>
                  <td>
                    <img src="{{ asset('backend_files/img/banners/large/'.$banner->image) }}" style="width: 300px; height: 200px;">
                  </td>
                  <td>

                    <a href="#myModal{{ $banner->id }}" data-toggle="modal" class="btn btn-success btn-mini tip-bottom" title="View Banner">View</a>
                    
                    <!-- <a href="{{ url('admin/delete-banner/'.$banner->id) }}" class="btn btn-danger btn-mini tip-bottom" title="Delete Banner">Delete</a> -->
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $banner->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>{{ $banner->foodTruck_display_name }}</center></h3>
                  </div>
                  <div class="modal-body">
                    <center>
                      <img src="{{ asset('backend_files/img/banners/large/'.$banner->image) }}" style="width: 500px; height:350px;">
                    </center>
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