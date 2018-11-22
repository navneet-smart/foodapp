@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-part-start-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">My Profile</a> 
    </div>
    <h1><center class="profile">My Profile</center></h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="row-fluid">
          
          <div class="span4">
          </div>
          
          <div class="span4">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                  <h5>
                    My Profile
                  </h5>
                  <span class="pull-right">
                    <a href="{{ url('admin/edit-profile/'.$user->id) }}" title="Edit Profile"><i class="icon-edit profile-icon"></i></a>
                  </span>
              </div>
              <div class="widget-content"><b>Name :</b> {{ $user->name }}</div>
              <div class="widget-content"><b>Email :</b> {{ $user->email }}</div>
              <div class="widget-content"><b>Role :</b> {{ $user->role }}</div>
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
</div> 
<!--Content-part-end--> 

@endsection