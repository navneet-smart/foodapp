@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-part-start-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('admin/profile') }}" title="Go to Profile" class="tip-bottom">Profile</a> 
      <a href="#" class="current">Edit Profile</a> </div>
    <h1>Edit Profile</h1>
  </div>

  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Profile</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{ url('admin/edit-profile/'.$userDetail->id) }}" name="edit_profile" id="edit_profile" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $userDetail->name }}">
                </div>
              </div>
              
              <div class="form-actions">
                <input type="submit" value="Update Profile" class="btn btn-warning">
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Content-part-end--> 

@endsection