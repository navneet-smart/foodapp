@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-deliveryBoys') }}" title="Go to Delivery Boys" class="tip-bottom">Delivery Boys</a> 
      <a href="#" class="current">Add Delivery Boy</a> 
    </div>
    <h1>Add Delivery Boy</h1>
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
            <form class="form-horizontal" method="post" action="{{ url('admin/add-deliveryBoy') }}" name="add_deliveryBoy" id="add_deliveryBoy" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" id="email">&nbsp;<span id="check_email"></span>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Contact</label>
                <div class="controls">
                  <input type="number" name="contact" id="contact" min="1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success tip-bottom" title="Save Delivery Boy">
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