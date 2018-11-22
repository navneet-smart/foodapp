@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-categories') }}" title="Go to Categories" class="tip-bottom">Admin Categories</a> 
      <a href="#" class="current">Add Category</a> 
    </div>
    <h1>Add Category</h1>
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
            
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">
                  <input type="text" name="category" id="category">&nbsp;<span id="check_category"></span>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Icon</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success tip-bottom" title="Save Category">
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