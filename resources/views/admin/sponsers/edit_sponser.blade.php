@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-sponsers') }}" title="Go to Sponsers" class="tip-bottom">Sponsers</a> 
      <a href="#" class="current">Edit Sponser</a> 
    </div>
    <h1>Add Sponser</h1>
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

            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-sponser/'.$sponserDetail->id) }}" name="edit_sponser" id="edit_sponser" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Display Name</label>
                <div class="controls">
                  <input type="text" name="display_name" id="display_name" value="{{ $sponserDetail->display_name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="margin-top: 26px;">Logo</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  
                  <input type="hidden" name="current_image" value="{{ $sponserDetail->image }}">
                  @if(empty($sponserDetail->image))
                  <img src="{{ asset('backend_files/img/no-image.png') }}" style="width: 80px;">
                  @else
                  <img src="{{ asset('backend_files/img/sponsers/small/'.$sponserDetail->image) }}" style="width: 80px;">
                  <a href="{{ url('admin/delete-sponser-image/'.$sponserDetail->id) }}" title="Delete Logo" style="color: #bb0303;">Delete Image</a>
                  @endif

                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Sponser">
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