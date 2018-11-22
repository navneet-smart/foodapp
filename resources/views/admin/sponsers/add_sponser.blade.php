@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/view-sponsers') }}" title="Go to Sponsers" class="tip-bottom">Sponsers</a> 
      <a href="#" class="current">Add Sponser</a> 
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

            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-sponser') }}" name="add_sponser" id="add_sponser" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Display Name</label>
                <div class="controls">
                  <input type="text" name="display_name" id="display_name">&nbsp;<span id="check_display_name"></span>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success tip-bottom" title="Save Sponser">
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