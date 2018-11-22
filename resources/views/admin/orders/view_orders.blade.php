@extends('layouts.adminLayout.admin_design')
@section('content')

<!--Content-Start-->
<div id="content">

  <!--Breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#" class="current">Orders</a> </div>
    <h1>Orders</h1>
  </div>
  <!--End-Breadcrumbs-->
  
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Pending Orders</a></li>
              <li><a data-toggle="tab" href="#tab2">Completed Orders</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Data table</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Combo ID</th>
                        <th>Customer Detail</th>
                        <th>Charges</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div id="tab2" class="tab-pane">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>Data table</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>Combo ID &nbsp; <i class="icon-sort pointer"></i></th>
                        <th>Customer Detail &nbsp; <i class="icon-sort pointer"></i></th>
                        <th>Charges &nbsp; <i class="icon-sort pointer"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                      <tr class="gradeX">
                        <td>{{ $order->cid }}</td>
                        <td>
                          <div class="widget-content"><b>Name :</b> {{ $order->name }}</div>
                          <div class="widget-content"><b>Email :</b> {{ $order->email }}</div>
                          <div class="widget-content"><b>Contact :</b> {{ $order->contact }}</div>
                        </td>
                        <td>
                          <div class="widget-content"><b>Charges : &euro; </b> {{ $order->charges }}</div>
                          <div class="widget-content"><b>Subtotal : &euro; </b> {{ $order->subtotal }}</div>
                          <div class="widget-content"><b>Total : &euro; </b> {{ $order->total }}</div>
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

      </div>
    </div>
  </div>
</div>
<!--End-Content-->

<!-- Firebase Script Start-->
<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>

<script>
// Initialize Firebase
var config = {
    apiKey: "{{ config('services.firebase.api_key') }}",
    authDomain: "{{ config('services.firebase.auth_domain') }}",
    databaseURL: "{{ config('services.firebase.database_url') }}",
    storageBucket: "{{ config('services.firebase.storage_bucket') }}",
};
firebase.initializeApp(config);

var database = firebase.database();

var lastIndex = 0;

// Get Data
firebase.database().ref('combos/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function(index, value){
      if(value) {
        var node = document.createElement('tr');
        node.innerHTML = "<td>" + value.cid + "</td>"

                + "<td>"
                + "<div class='widget-content'><b>Name : </b>" + value.customer.name + "</div>"
                + "<div class='widget-content'><b>Email : </b>" + value.customer.email + "</div>"
                + "<div class='widget-content'><b>Contact : </b>" + value.customer.contact +"</div>"
                + "</td>"

                + "<td>"
                + "<div class='widget-content'><b>Charges : </b> &euro; " + value.charges + "</div>"
                + "<div class='widget-content'><b>Subtotal : </b> &euro; " + value.subtotal + "</div>"
                + "<div class='widget-content'><b>Total : </b> &euro; " + value.total +"</div>"
                + "</td>"

        htmls.push(node);

      }       
      lastIndex = index;
    });
    $('#tbody').html(htmls);
});
</script>
<!-- Firebase Script End -->

@endsection