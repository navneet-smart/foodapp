@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-foodTrucks') }}" title="Go to Food Trucks" class="tip-bottom">Food Trucks</a> 
      <a href="#" class="current">Edit Provider Category</a> 
    </div>
    <h1>Edit Provider Category</h1>
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
            
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-provider-category/'.$providercategoryDetail->id) }}" name="edit_provider_category" id="edit_provider_category" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">
                  <input type="text" name="category" id="category" value="{{ $providercategoryDetail->category }}">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-warning tip-bottom" title="Update Provider Category">
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