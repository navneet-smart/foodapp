@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Owners</a> </div>
    <h1>
      Owners
      <span>
        <a href="{{ url('admin/add-owner/') }}" class="btn btn-primary tip-bottom pull-right addbutton" title="Add New Owner"><i class="icon-plus-sign"></i> <span>Add Owner</span></a>
    </span>
    </h1>
  </div>
  <!--End-Breadcrumbs-->

  <div class="container-fluid"><hr>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Owner ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Name &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Email &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($owners as $owner)
                <tr class="gradeX">
                  <td>{{ $owner->id }}</td>
                  <td>{{ $owner->name }}</td>
                  <td>{{ $owner->email }}</td>
                  <td>{{ $owner->role }}</td>
                  <td>
                    <a href="{{ url('admin/edit-owner/'.$owner->id) }}" class="tip-bottom" title="Edit Owner"><i class="icon-edit"></i></a>

                    <a href="#myModal{{ $owner->id }}" data-toggle="modal" class="tip-bottom" title="View Owner"><i class="icon-eye-open"></i></a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $owner->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>Full Details</center></h3>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="mycolumn">
                        <p><b>Owner ID :</b></p>
                        <p><b>Name :</b></p>
                        <p><b>Email :</b></p>
                        <p><b>Role :</b></p>
                      </div>
                      <div class="mycolumn">
                        <p>{{ $owner->id }}</p>
                        <p>{{ $owner->name }}</p>
                        <p>{{ $owner->email }}</p>
                        <p>{{ $owner->role }}</p>
                      </div>
                    </div>

                  </div>
                </div>
                <!--End-Modal-->

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End-Content-->

@endsection