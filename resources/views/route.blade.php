@extends('layouts.fon')
@section('content')
    <div class="row">
       <?php echo Session::pull('query_message');?>
       <h4>
            Registered Route: {{ $route->route_number }} <i class="fa fa-arrow-right" aria-hidden="true"></i>
            OLT: {{ $route->olt }} <i class="fa fa-arrow-right" aria-hidden="true"></i>
            OLT Card: {{ $route->olt_card}} <i class="fa fa-arrow-right" aria-hidden="true"></i>
            Port: {{ $route->olt_card_port }}
        </h4>
        <hr>
   </div>

@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function ($) {
  });
</script>

@endsection