@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Sponsers</a> </div>
    <h1>
      Sponsers
      <span>
        <a href="{{ url('admin/add-sponser/') }}" class="btn btn-primary tip-bottom pull-right addbutton" title="Add Sponser"><i class="icon-plus-sign"></i> <span>Add Sponser</span></a>
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
                  <th>ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Display Name &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sponsers as $sponser)
                <tr class="gradeX">
                  <td>{{ $sponser->id }}</td>
                  <td>{{ $sponser->display_name }}</td>
                  <td>
                    @if(empty($sponser->image))
                    <img src="{{ asset('backend_files/img/no-image.png') }}" class="sponser_size">
                    @else
                    <img src="{{ asset('backend_files/img/sponsers/small/'.$sponser->image) }}" class="sponser_size">
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('admin/edit-sponser/'.$sponser->id) }}" class="tip-bottom" title="Edit Sponser"><i class="icon-edit"></i></a>

                    <a href="#myModal{{ $sponser->id }}S" data-toggle="modal" class="tip-bottom" title="View Sponser"><i class="icon-eye-open"></i></a>
                    
                    <!-- <a href="{{ url('admin/delete-sponser/'.$sponser->id) }}" class="btn btn-danger btn-mini tip-bottom" title="Delete Sponser">Delete</a> -->

                    <a rel="{{ $sponser->id }}" rel1="delete-sponser" href="javascript:" class="tip-bottom deleteRecord" title="Delete Sponser"><i class="icon-remove"></i></a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $sponser->id }}S" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>{{ $sponser->display_name }}</center></h3>
                  </div>
                  <div class="modal-body">
                    <center>
                      @if(empty($sponser->image))
                      <img src="{{ asset('backend_files/img/no-image.png') }}" class="sponser_modal">
                      @else
                      <img src="{{ asset('backend_files/img/sponsers/large/'.$sponser->image) }}" class="sponser_modal">
                      @endif
                    </center>
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