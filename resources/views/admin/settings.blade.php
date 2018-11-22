@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-part-start-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Settings</a> 
    </div>
    <h1>Settings</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Update Your Password</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{ url('admin/update-pwd') }}" name="settings" id="settings" novalidate="novalidate">{{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Current Password</label>
                <div class="controls">
                  <input type="password" name="current_pwd" id="current_pwd" />&nbsp;<span id="check_pwd"></span>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">New Password</label>
                <div class="controls">
                  <input type="password" name="new_pwd" id="new_pwd" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Confirm password</label>
                <div class="controls">
                  <input type="password" name="confirm_pwd" id="confirm_pwd" />
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update Password" class="btn btn-warning tip-bottom" title="Update Your Password">
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