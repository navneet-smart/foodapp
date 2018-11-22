@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-owners') }}" title="Go to Owners" class="tip-bottom">Owners</a> 
      <a href="#" class="current">Edit Owner</a> 
    </div>
    <h1>Edit Owner</h1>
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
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-owner/'.$ownerDetail->id) }}" name="edit_owner" id="edit_owner" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $ownerDetail->name }}">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Owner">
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