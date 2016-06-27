@extends('layouts.fon')
@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h3>Create Route</h3>
	        <div class="col-xs-6 col-sm-6 col-md-4">
	            <div class="form-group">
	            	<label>OLT</label>
	                <select class="form-control" id="olt">
	                	<option>--select OLT--</option>
	                	{!! $olt !!}
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-6 col-sm-6 col-md-3">
	            <div class="form-group">
	            	<label>OLT Card</label>
	                <select class="form-control" id="olt_cards">
	                	<option>--select OLT first--</option>
	                </select>
	            </div>
	        </div>
	        <div class="col-xs-6 col-sm-6 col-md-3">
	            <div class="form-group">
	            	<label>OLT Card-Port</label>
	                <select class="form-control" id="olt_card_ports">
	                	<option>--select OLT Card first--</option>
	                </select>
	            </div>
	        </div>
        </div>
    </div>

@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function ($) {
          $(document.body).on("change","#olt",function(){
            var olt_id = $(this).val();
            load_olt_cards(olt_id);
          });
          $(document.body).on("change","#olt_cards",function(){
            var olt_card_id = $(this).val();
            load_olt_card_ports(olt_card_id);
          });

        function load_olt_cards(olt_id)
        {
            $.ajax({
                url:"/load-olt-cards",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type:"post",
                data:{olt_id:olt_id},
                success: function(s)
                {
                    $("#olt_cards").html(s);
                }
            });
        }
        function load_olt_card_ports(olt_card_id)
        {
            $.ajax({
                url:"/load-olt-card-ports",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type:"post",
                data:{olt_card_id:olt_card_id},
                success: function(s)
                {
                    $("#olt_card_ports").html(s);
                }
            });
        }
  });
</script>

@endsection