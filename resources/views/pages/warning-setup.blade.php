@extends('layouts.master')
@section('content')
<div class="content pb-0">

	<div class="container">
		<div class="row">
			<!-- WARNING SETUP OF SENSOR STATION 1 -->
			@include('pages.warning.sss1')

			<!-- WARNING SETUP OF SENSOR STATION 3 -->
			@include('pages.warning.sss3')

			<div class=" col-lg-12 card">
				<div class="card-header">
					{{trans('warning.duavematdinh')}}
				</div>
				<div class="card-body">
					<button  id="btn-warning-reset" type="" class="btn btn-primary" >Reset</button>
				</div>
			</div>


			<div class="col-lg-12 card">
				<div class="card-header">{{trans('warning.danhsachmail')}}</div>
				<div class="card-body">
					<ul class="list-group" id="warning-list-mails">
						<li class="list-group-item">Loading ...<button class="btn btn-danger float-right">DELETE</button></li>
					</ul>
					<br>
					<div class="row">
						<div class="col-sm-10">
							<input id="input-warning-mail" class="form-control" type="mail" name="">
						</div>
						<div class="col-sm-2">
							<button id="btn-add-warning-mail" class="btn btn-primary">{{trans('warning.them')}}</button>
						</div>
					</div>
				</div>
			</div>

		</div>	
	</div>








</div>
@include ('layouts.script-warning-setup')
@endsection() 	
