@if(Session::has('flash_message_success'))
<div class="alert alert-success alert-block" id="myflash">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif
@if(Session::has('flash_message_error'))
<div class="alert alert-danger alert-block" id="myflash">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif

<script type="text/javascript">
	setTimeout(function() {
	    $('#myflash').fadeOut('slow');
	}, 5000);
</script>