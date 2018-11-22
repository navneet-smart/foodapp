@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-foodTrucks') }}" title="Go to Food Trucks" class="tip-bottom">Food Trucks</a> 
      <a href="#" class="current">Edit Food Truck</a> 
    </div>
    <h1>Edit Food Truck</h1>
  </div>
  <!--End-Breadcrumbs-->

  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Fill The Form</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-foodTruck/'.$foodTruckDetail->id) }}" name="edit_foodTruck" id="edit_foodTruck" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Display Name</label>
                <div class="controls">
                  <input type="text" name="display_name" id="display_name" value="{{ $foodTruckDetail->display_name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Speciality</label>
                <div class="controls">
                  <input type="text" name="speciality" id="speciality" value="{{ $foodTruckDetail->speciality }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Min Order Value</label>
                <div class="controls">
                  <input type="number" name="min_order_value" id="min_order_value" value="{{ $foodTruckDetail->min_order_value }}">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Food Truck">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End-Content-->

@endsection