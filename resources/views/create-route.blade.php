@extends('layouts.fon')
@section('content')
    <div class="row">
    	<div class="col-md-7">
    		<h3>Create Route</h3>
            <form role="form" method="post" action="/register-route" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    	        <div class="col-xs-6 col-sm-12 col-md-8" class="form-control">
    	            <div class="form-group">
    	            	<label>OLT</label>
    	                <select class="form-control" name="olt" id="olt">
    	                	<option>--select OLT--</option>
    	                	{!! $olt !!}
    	                </select>
    	            </div>
                    <div class="form-group">
                        <label>OLT Card</label>
                        <select class="form-control" name="olt_card" id="olt_cards">
                            <option>--select OLT first--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>OLT Card-Port</label>
                        <select class="form-control" name="olt_card_port" id="olt_card_ports">
                            <option>--select OLT Card first--</option>
                        </select>
                    </div>                 
                    <div class="form-group">
                    <input type="text" value="{{ $route_number }}" name="route_number" class="form-control" />
                        <button class="btn btn-success">Register Route</button>
                    </div>                
    	        </div>
            </form>
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