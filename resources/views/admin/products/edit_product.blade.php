@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-foodTrucks') }}" title="Go to Food Trucks" class="tip-bottom">Food Trucks</a> 
      <a href="#" class="current">Edit Product</a> 
    </div>
    <h1>Edit Product</h1>
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
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-product/'.$productDetail->id) }}" name="edit_product" id="edit_product" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $productDetail->name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Display Name</label>
                <div class="controls">
                  <input type="text" name="display_name" id="display_name" value="{{ $productDetail->display_name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea type="text" name="description" id="description">{{ $productDetail->description }}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Size and Price</label>
                <div class="controls">
                  <input type="text" name="size_and_price" id="size_and_price" value="{{ $productDetail->size_and_price }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Is Veg</label>
                <div class="controls">
                  <input type="checkbox" name="is_veg" id="is_veg" @if($productDetail->is_veg=="1") checked @endif value="1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Product">
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