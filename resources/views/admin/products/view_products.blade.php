@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Products</a> </div>
    <h1>Products</h1>
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
                  <th>Product ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <!-- <th>Truck ID &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <th>Food Truck &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Banner</th>
                  <!-- <th>Category ID &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <th>Category &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Name &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Display Name &nbsp; <i class="icon-sort pointer"></i></th>
                  <!-- <th>Description &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <th>Size and Price &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Is Veg &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $product->id }}</td>
                  <!-- <td>{{ $product->f_id }}</td> -->
                  <td>{{ $product->food_truck->display_name }}</td>
                  <td>
                    @if(empty($product->banner->image))
                    <img src="{{ asset('backend_files/img/no-banner.png') }}" class="banner_size">
                    @else
                    <img src="{{ asset('backend_files/img/banners/large/'.$product->banner->image) }}" class="banner_size">
                    @endif
                  </td>
                  <!-- <td>{{ $product->cat_id }}</td> -->
                  <td>{{ $product->category->category }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->display_name }}</td>
                  <!-- <td>{{ $product->description }}</td> -->
                  <td>&euro; {{ $product->size_and_price }}</td>
                  <td>
                   @if($product->is_veg == 1)
                   <img src="{{ asset('backend_files/img/veg.png') }}" class="veg-non-veg">
                   @else
                   <img src="{{ asset('backend_files/img/non-veg.png') }}" class="veg-non-veg">
                   @endif
                  </td>
                  <td>
                    <a href="{{ url('admin/edit-product/'.$product->id) }}" class="btn btn-warning btn-mini tip-bottom" title="Edit Product">Edit</a>

                    <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini tip-bottom" title="View Product">View</a>

                    <!-- <a href="{{ url('admin/delete-product/'.$product->id) }}" class="btn btn-danger btn-mini tip-bottom" title="Delete Product">Delete</a> -->

                    <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini tip-bottom deleteRecord" title="Delete Product">Delete</a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $product->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>Full Details</center></h3>
                  </div>
                  <div class="modal-body">
                    
                    <center>
                      @if(empty($product->banner->image))
                      <img src="{{ asset('backend_files/img/no-banner.png') }}" class="banner_modal">
                      @else
                      <img src="{{ asset('backend_files/img/banners/large/'.$product->banner->image) }}" class="banner_modal">
                      @endif
                    </center><hr>
                    
                    <div class="row">
                      <div class="mycolumn">
                        <p><b>Product ID :</b></p>
                        <p><b>Truck ID :</b></p>
                        <p><b>Truck Name :</b></p>
                        <p><b>Category ID :</b></p>
                        <p><b>Category :</b></p>
                        <p><b>Name :</b></p>
                        <p><b>Display Name :</b></p>
                        <p><b>Description :</b></p>
                        <p><b>Size and Price :</b></p>
                        <p><b>Is Veg :</b></p>
                      </div>
                      <div class="mycolumn">
                        <p>{{ $product->id }}</p>
                        <p>{{ $product->f_id }}</p>
                        <p>{{ $product->food_truck->display_name }}</p>
                        <p>{{ $product->cat_id }}</p>
                        <p>{{ $product->category->category }}</p>
                        <p>{{ $product->name }}</p>
                        <p>{{ $product->display_name }}</p>

                        @if(empty($product->description))
                        <p>Nill</p>
                        @else
                        <p>{{ $product->description }}</p>
                        @endif

                        <p>&euro; {{ $product->size_and_price }}</p>
                        <p>
                          @if($product->is_veg == 1)
                           <img src="{{ asset('backend_files/img/veg.png') }}" class="veg-non-veg">
                           @else
                           <img src="{{ asset('backend_files/img/non-veg.png') }}" class="veg-non-veg">
                           @endif
                        </p>
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