@extends('layouts.master')

@section('content')
<div class="content pb-0">

               <!-- Widgets  -->
               @include ('pages.home.value-now')
                <!-- Widgets End -->

               <!--  Traffic  -->
               @include ('pages.chart.chart')
               <!--  Traffic  End -->

               <!-- Calender Chart Weather  -->
               @include('pages.home.linh-tinh')
</div>


@endsection() 	
