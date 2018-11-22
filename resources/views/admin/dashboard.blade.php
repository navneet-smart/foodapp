@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="#" class="current"><i class="icon-home"></i> Home</a>
    </div>
  </div>
  <!--End-Breadcrumbs-->

  <!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        
        <li class="bg_lb"> 
          <a href="{{ url('admin/view-owners') }}"> <i class="icon-group"></i> <span class="label label-important">{{ $owners_count }}</span>Owners</a> 
        </li>

        <li class="bg_lg span3"> 
          <a href="{{ url('admin/view-foodTrucks') }}"> <i class="icon-truck"></i><span class="label label-important">{{ $foodTrucks_count }}</span>Food Trucks</a> 
        </li>

        <li class="bg_lo"> 
          <a href="{{ url('admin/view-foodTrucks') }}"> <i class="icon-book"></i><span class="label label-success">{{ $products_count }}</span>Products</a> 
        </li>

        <li class="bg_ls"> 
          <a href="{{ url('admin/view-sponsers') }}"><i class="icon-flag"></i><span class="label label-important">{{ $sponsers_count }}</span>Sponsers</a>
        </li>

        <li class="bg_lo"> 
          <a href="{{ url('admin/view-orders') }}"><i class="icon-shopping-cart"></i><span class="label label-success">{{ $orders_count }}</span>Orders</a> 
        </li>

        <li class="bg_ly span3"> 
          <a href="{{ url('admin/view-deliveryBoys') }}"><i class="icon-group"></i><span class="label label-success">{{ $dboys_count }}</span>Delivery Boys</a> 
        </li>

        <li class="bg_lb"> 
          <a href="{{ url('admin/view-categories') }}"> <i class="icon-th-list"></i> <span class="label label-important">{{ $categories_count }}</span>Admin Categories</a> 
        </li>

      </ul>
    </div>

    <div class="row-fluid">
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
            <h5>Overall Statistics</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Types</th>
                  <th>Charges</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Delivery Charges</td>
                  <td>
                    <span class="date badge badge-info"> &euro; {{ $sum_of_charges }}</span>
                  </td>
                </tr>
                <tr>
                  <td>Subtotal</td>
                  <td>
                    <span class="date badge badge-info"> &euro; {{ $sum_of_subtotal }}</span>
                  </td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td>
                    <span class="date badge badge-info"> &euro; {{ $sum_of_total }}</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Sales Report</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Truck Name &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Sale &nbsp; <i class="icon-sort pointer"></i></th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($foodTrucks as $foodTruck)
                <tr class="gradeX">
                  <td>{{ $foodTruck->display_name }}</td>
                  <td>
                    <?php
                    $total_array = array(); 
                    foreach ($foodTruck->items as $key => $value) {
                        array_push($total_array, $value->total);
                    }
                    $total_sum = array_sum($total_array);
                    echo '<span class="label label-inverse"> &euro; '.$total_sum .'</span>';
                    ?>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--End-Action boxes-->    

</div>
<!--End-Content-->

@endsection