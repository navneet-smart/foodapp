@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-deliveryBoys') }}" title="Go to Delivery Boys" class="tip-bottom">Delivery Boys</a> 
      <a href="#" class="current">Edit Delivery Boy</a> 
    </div>
    <h1>Edit Delivery Boy</h1>
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
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-deliveryBoy/'.$dbDetail->id) }}" name="edit_deliveryBoy" id="edit_deliveryBoy" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $dbDetail->name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Contact</label>
                <div class="controls">
                  <input type="number" name="contact" id="contact" min="1" value="{{ $dbDetail->contact }}">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Delivery Boy">
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