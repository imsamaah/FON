@extends('layouts.fon')
@section('content')
    <div class="row">
       <?php echo Session::pull('query_message');?>
       <h4>
            Registered Route: {{ $route->route_number }} <br><i class="fa fa-arrow-right" aria-hidden="true"></i>
            OLT: {{ $route->olt }} <i class="fa fa-arrow-right" aria-hidden="true"></i>
            OLT Card: {{ $route->olt_card}} <i class="fa fa-arrow-right" aria-hidden="true"></i>
            Port: {{ $route->olt_card_port }}
        </h4>
        <hr>
   </div>
   <div class="row">
      <div class="col-xs-6 col-sm-12 col-md-4" class="form-control">
          <div class="form-group">
            <label>Plant</label>
              <select class="form-control" name="plant_type" id="plant_type">
                <option>--select plant--</option>
                {!! $plants !!}
              </select>
          </div>
          <div class="form-group">
            <label id="plant_name_label">Plant</label>
              <select class="form-control" name="plant_name" id="plant_name">               
              </select>
          </div>
      </div>
   </div>
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function ($) {
    $(document.body).on("change","#plant_type",function(){
      var plant_type = $(this).val();
      $.ajax({
          url:"/load-plant-details",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          type:"post",
          data:{plant_type:plant_type},
          success: function(s)
          {
              $("#plant_name").html(s);
              $("#plant_name_label").html($("#plant_type option:selected").text());
          }
      });
      
    });
    $(document.body).on("change","#plant_name",function(){
      var plant_name = $(this).val();
      $.ajax({
          url:"/load-plant-details",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          type:"post",
          data:{plant_type:plant_type},
          success: function(s)
          {
              $("#plant_name").html(s);
              $("#plant_name_label").html($("#plant_type option:selected").text());
          }
      });
      
    });
  });
</script>

@endsection