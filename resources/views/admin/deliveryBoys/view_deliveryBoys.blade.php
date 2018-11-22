@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Delivery Boys</a> </div>
    <h1>
      Delivery Boys
      <span>
          <a href="{{ url('admin/add-deliveryBoy/') }}" class="btn btn-primary tip-bottom pull-right addbutton" title="Add New Boy"><i class="icon-plus-sign"></i> <span>Add Delivery Boy</span></a>
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
                  <th>DB ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Name &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Email &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Contact &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dboys as $boy)
                <tr class="gradeX">
                  <td>{{ $boy->id }}</td>
                  <td>{{ $boy->name }}</td>
                  <td>{{ $boy->email }}</td>
                  <td>{{ $boy->contact }}</td>
                  <td>{{ $boy->role }}</td>
                  <td>
                    <a href="{{ url('admin/edit-deliveryBoy/'.$boy->id) }}" class="tip-bottom" title="Edit Delivery Boy"><i class="icon-edit"></i></a>

                    <a href="#myModal{{ $boy->id }}B" data-toggle="modal" class="tip-bottom" title="View Delivery Boy"><i class="icon-eye-open"></i></a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $boy->id }}B" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>Full Details</center></h3>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="mycolumn">
                        <p><b>DB ID :</b></p>
                        <p><b>Name :</b></p>
                        <p><b>Email :</b></p>
                        <p><b>Contact :</b></p>
                        <p><b>Role :</b></p>
                      </div>
                      <div class="mycolumn">
                        <p>{{ $boy->id }}</p>
                        <p>{{ $boy->name }}</p>
                        <p>{{ $boy->email }}</p>
                        <p>{{ $boy->contact }}</p>
                        <p>{{ $boy->role }}</p>
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