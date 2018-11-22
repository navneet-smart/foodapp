@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Food Trucks</a> </div>
    <h1>Food Trucks</h1>
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
                  <th>Truck ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <!-- <th>Owner ID &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <th>Truck Information &nbsp; <i class="icon-sort pointer"></i></th>
                  <!-- <th>Owner Name &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <!-- <th>Banner</th> -->
                  <!-- <th>Speciality &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <!-- <th>Min Order Value &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <!-- <th>Categories &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <th>Products &nbsp; <i class="icon-sort pointer"></i></th>
                  <!-- <th>Note &nbsp; <i class="icon-sort pointer"></i></th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($foodTrucks as $foodTruck)
                <tr class="gradeX">
                  <td>{{ $foodTruck->id }}</td>
                  <!-- <td>{{ $foodTruck->user_id }}</td> -->
                  <td>
                    <div class="widget-content"><b>Truck Name :</b> {{ $foodTruck->display_name }}</div>
                    <div class="widget-content"><b>Owner Name :</b> {{ $foodTruck->owner->name }}</div>
                    <div class="widget-content"><b>Speciality :</b> {{ $foodTruck->speciality }}</div>
                  </td>
                  <!-- <td>{{ $foodTruck->owner->name }}</td> -->
                  <!-- <td>
                    @if(empty($foodTruck->banner->image))
                    <img src="{{ asset('backend_files/img/no-banner.png') }}" class="banner_size">
                    @else
                    <img src="{{ asset('backend_files/img/banners/large/'.$foodTruck->banner->image) }}" class="banner_size">
                    @endif
                  </td> -->
                  <!-- <td>{{ $foodTruck->speciality }}</td> -->
                  <!-- <td>&euro; {{ $foodTruck->min_order_value }}</td> -->
                  <!-- <td>{{ $foodTruck->note }}</td> -->
                  <!-- <td>
                    <ul>
                      @foreach($foodTruck->categories as $category)
                      <li>
                        {{ $category->category }}

                        <span>
                          <a href="{{ url('admin/edit-provider-category/'.$category->id) }}" class="tip-bottom" title="Edit Provider Category"><i class="icon-edit"></i></a>

                          <a rel="{{ $category->id }}" rel1="delete-provider-category" href="javascript:" class="tip-bottom deleteRecord" title="Delete Provider Category"><i class="icon-remove"></i></a>
                        </span>
                      </li>
                      @endforeach
                    </ul>
                  </td> -->
                  <td>

                     <div class="accordion-group widget-box">
                      <div class="accordion-heading">
                        <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo{{ $foodTruck->id }}" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                          <h5>Categories List</h5><span class="date badge badge-important badge-count">{{ count($foodTruck->categories) }}</span>
                          </a> </div>
                      </div>
                      <div class="collapse accordion-body" id="collapseGTwo{{ $foodTruck->id }}">
                        @foreach($foodTruck->categories as $category)
                          <div class="widget-content"><i class="icon-hand-right"></i>&nbsp; {{ $category->category }}
                            <span class="pull-right">
                              <a href="{{ url('admin/edit-provider-category/'.$category->id) }}" title="Edit Provider Category"><i class="icon-edit"></i></a>

                              <!-- <a href="#myModal{{ $category->id }}C" data-toggle="modal" title="View Provider Category"><i class="icon-eye-open"></i></a> -->

                              <a rel="{{ $category->id }}" rel1="delete-provider-category" href="javascript:" class="deleteRecord" title="Delete Provider Category"><i class="icon-remove"></i></a>
                            </span>
                          </div>

                          <!--Modal-->
                         <!--  <div id="myModal{{ $category->id }}C" class="modal hide">
                            <div class="modal-header">
                              <button data-dismiss="modal" class="close" type="button">×</button>
                              <h3><center>Full Details</center></h3>
                            </div>
                            <div class="modal-body">
                              
                              @foreach($foodTruck->products as $product)
                              <p>{{ $product->display_name }}</p>
                              @endforeach

                            </div>
                          </div> -->
                          <!--End-Modal-->

                        @endforeach
                      </div>
                    </div>

                    <div class="accordion-group widget-box">
                      <div class="accordion-heading">
                        <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo{{ $foodTruck->id }}P" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                          <h5>Products List</h5><span class="date badge badge-info badge-count">{{ count($foodTruck->products) }}</span>
                          </a> </div>
                      </div>
                      <div class="collapse accordion-body" id="collapseGTwo{{ $foodTruck->id }}P">

                        @foreach($foodTruck->products as $product)
                          <div class="widget-content">
                            <span>
                              @if($product->is_veg == 1)
                              <img src="{{ asset('backend_files/img/veg.png') }}" class="veg-non-veg">
                              @else
                              <img src="{{ asset('backend_files/img/non-veg.png') }}" class="veg-non-veg">
                              @endif
                            </span>
                            &nbsp; {{ $product->display_name }} &nbsp; <span class="label label-inverse">&euro; {{ $product->size_and_price }}</span>
                            <span class="pull-right">
                              <a href="{{ url('admin/edit-product/'.$product->id) }}" title="Edit Product"><i class="icon-edit"></i></a>

                              <a href="#myModal{{ $product->id }}P" data-toggle="modal" title="View Product"><i class="icon-eye-open"></i></a>

                              <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="deleteRecord" title="Delete Product"><i class="icon-remove"></i></a>
                            </span>
                          </div>

                          <!--Modal-->
                          <div id="myModal{{ $product->id }}P" class="modal hide">
                            <div class="modal-header">
                              <button data-dismiss="modal" class="close" type="button">×</button>
                              <h3><center>Full Details</center></h3>
                            </div>
                            <div class="modal-body">
                              
                              <div class="row">
                                <div class="mycolumn">
                                  <p><b>Product ID :</b></p>
                                  <p><b>Name :</b></p>
                                  <p><b>Display Name :</b></p>
                                  <p><b>Description :</b></p>
                                  <p><b>Size and Price :</b></p>
                                  <p><b>Is Veg :</b></p>
                                </div>
                                <div class="mycolumn">
                                  <p>{{ $product->id }}</p>
                                  <p>{{ $product->name }}</p>
                                  <p>{{ $product->display_name }}</p>

                                  @if(empty($product->description))
                                  <p>Nill</p>
                                  @else
                                  <p>{{ $product->description }}</p>
                                  @endif

                                  <p><span class="label label-inverse">&euro; {{ $product->size_and_price }}</span></p>
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
                      </div>
                    </div>

                  </td>
                  <td>
                    <a href="{{ url('admin/edit-foodTruck/'.$foodTruck->id) }}" class="tip-bottom" title="Edit Food Truck"><i class="icon-edit"></i></a>

                    <a href="#myModal{{ $foodTruck->id }}F" data-toggle="modal" class="tip-bottom" title="View Food Truck"><i class="icon-eye-open"></i></a>

                    <!-- <a href="{{ url('admin/delete-foodTruck/'.$foodTruck->id) }}" class="btn btn-danger btn-mini tip-bottom" title="Delete Food Truck">Delete</a> -->

                    <a rel="{{ $foodTruck->id }}" rel1="delete-foodTruck" href="javascript:" class="tip-bottom deleteRecord" title="Delete Food Truck"><i class="icon-remove"></i></a>
                  </td>
                </tr>

                <!--Modal-->
                <div id="myModal{{ $foodTruck->id }}F" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><center>Full Details</center></h3>
                  </div>
                  <div class="modal-body">
                    
                    <center>
                      @if(empty($foodTruck->banner->image))
                      <img src="{{ asset('backend_files/img/no-banner.png') }}" class="banner_modal">
                      @else
                      <img src="{{ asset('backend_files/img/banners/large/'.$foodTruck->banner->image) }}" class="banner_modal">
                      @endif
                    </center>

                    <hr>

                    <center><b>Truck Information</b></center>

                    <hr>

                    <div class="row">
                      <div class="mycolumn">
                        <p><b>Truck ID :</b></p>
                        <!-- <p><b>Owner ID :</b></p> -->
                        <p><b>Owner Name :</b></p>
                        <p><b>Display Name :</b></p>
                        <p><b>Speciality :</b></p>
                        <p><b>Min Order Value :</b></p>
                        <p><b>Note :</b></p>
                        <!-- <p><b>Categories :</b></p>
                        <p><b>Products :</b></p> -->
                      </div>
                      <div class="mycolumn">
                        <p>{{ $foodTruck->id }}</p>
                        <!-- <p>{{ $foodTruck->user_id }}</p> -->
                        <p>{{ $foodTruck->owner->name }}</p>
                        <p>{{ $foodTruck->display_name }}</p>
                        <p>{{ $foodTruck->speciality }}</p>
                        <p><span class="label label-important">&euro; {{ $foodTruck->min_order_value }}</span></p>
                        
                        @if(empty($foodTruck->note))
                        <p>Nill</p>
                        @else
                        <p>{{ $foodTruck->note }}</p>
                        @endif

                        <!-- @if(empty($foodTruck->categories))
                        <p>Nill</p>
                        @else
                        <p>
                            @foreach($foodTruck->categories as $category)
                            {{ $category->category }}&nbsp;,
                            @endforeach
                        </p>
                        @endif

                        @if(empty($foodTruck->products))
                        <p>Nill</p>
                        @else
                        <p>
                            @foreach($foodTruck->products as $product)
                            {{ $product->display_name }}&nbsp;,
                            @endforeach
                        </p>
                        @endif -->
                        
                      </div>
                    </div>

                    <hr><center><b>Categories</b></center><hr>

                    @foreach($foodTruck->categories as $category)
                    <p><i class="icon-hand-right"></i>&nbsp; {{ $category->category }}</p>
                    @endforeach

                    <hr><hr><center><b>Products</b></center><hr>

                    @foreach($foodTruck->products as $product)

                      <div class="row">
                        <div class="mycolumn">
                          <span>
                            @if($product->is_veg == 1)
                            <img src="{{ asset('backend_files/img/veg.png') }}" class="veg-non-veg">
                            @else
                            <img src="{{ asset('backend_files/img/non-veg.png') }}" class="veg-non-veg">
                            @endif
                          </span>
                          &nbsp; {{ $product->display_name }}
                        </div>
                        <div class="mycolumn">
                          <span class="label label-inverse">&euro; {{ $product->size_and_price }}</span>
                        </div>
                      </div>
                      
                    @endforeach

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