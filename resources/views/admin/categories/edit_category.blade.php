@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-categories') }}" title="Go to Categories" class="tip-bottom">Admin Categories</a> 
      <a href="#" class="current">Edit Category</a> 
    </div>
    <h1>Edit Category</h1>
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
            
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-category/'.$categoryDetail->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">
                  <input type="text" name="category" id="category" value="{{ $categoryDetail->category }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="margin-top: 26px;">Icon</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  
                  <input type="hidden" name="current_image" value="{{ $categoryDetail->image }}">
                  @if(empty($categoryDetail->image))
                  <img src="{{ asset('backend_files/img/no-image.png') }}" style="width: 80px;">
                  @else
                  <img src="{{ asset('backend_files/img/categories/small/'.$categoryDetail->image) }}" style="width: 80px;">
                  <a href="{{ url('admin/delete-category-image/'.$categoryDetail->id) }}" title="Delete Logo" style="color: #bb0303;">Delete Image</a>
                  @endif

                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Category">
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