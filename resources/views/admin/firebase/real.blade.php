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
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Combo ID &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Charges &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Sub Total &nbsp; <i class="icon-sort pointer"></i></th>
                  <th>Total &nbsp; <i class="icon-sort pointer"></i></th>
                </tr>
              </thead>
              <tbody id="tbody">
                
              </tbody>
            </table>
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
    		console.log(value);
    		
			var node = document.createElement('tr');
			node.innerHTML = "<td>" + value.cid + "</td>"
							+ "<td> &euro; " + value.charges + "</td>"
							+ "<td> &euro; " + value.subtotal + "</td>"
							+ "<td> &euro; " + value.total + "</td>";
    		htmls.push(node);

    	}    	 	
    	lastIndex = index;
    });
    $('#tbody').html(htmls);
});
</script>
<!-- Firebase Script End -->

@endsection