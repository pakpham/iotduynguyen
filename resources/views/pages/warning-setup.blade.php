@extends('layouts.master')
@section('content')
<div class="content pb-0">

<div class="container">
	<div class="row">
		<div class="col col-lg-12">
			<div class="card">
			<div class="card-header">Station 1</div>
			<div class="card-body">
				<form>
				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Sensor1:</label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control" id="warning-ss1-1" name="warning-ss1-1" placeholder="number" value="@if(isset($sss1)){{$sss1[0]->ss1}}@endif">
				    </div>
				    <div class="col-sm-2">Cảnh báo khi:</div>
				    <div class="col-sm-4">
						<div class="form-group">
					    <select class="form-control" id="warning-sign-ss1-1" name="warning-sign-ss1-1"  >
					      <option value="1" >Cao hơn giá trị ngưỡng</option>
					      <option <?php if(isset($sss1)) if($sss1[0]->ss1_sign == 0 )echo'selected';?>  value="0">Thấp hơn giá trị ngưỡng</option>
					    </select>
					  	</div>				    
					</div>
				  </div>

				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Sensor2:</label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control" id="warning-ss1-2" name="warning-ss1-2" placeholder="number"value="@if(isset($sss1)){{$sss1[0]->ss2}}@endif">
				    </div>
				    <div class="col-sm-2">Cảnh báo khi:</div>
				    <div class="col-sm-4">
						<div class="form-group">
					    <select class="form-control" id="warning-sign-ss1-2" name="warning-sign-ss1-2">
					      <option value="1">Cao hơn giá trị ngưỡng</option>
					      <option <?php if(isset($sss1)) if($sss1[0]->ss2_sign == 0 )echo'selected';?> value="0">Thấp hơn giá trị ngưỡng</option>
					    </select>
					  	</div>				    
					</div>
				  </div>

				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Sensor3:</label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control" id="warning-ss1-3" name="warning-ss1-3" placeholder="number" value="@if(isset($sss1)){{$sss1[0]->ss3}}@endif">
				    </div>
				    <div class="col-sm-2">Cảnh báo khi:</div>
				    <div class="col-sm-4">
						<div class="form-group">
					    <select class="form-control" id="warning-sign-ss1-3" name="warning-sign-ss1-3">
					      <option value="1">Cao hơn giá trị ngưỡng</option>
					      <option <?php if(isset($sss1)) if($sss1[0]->ss3_sign == 0 )echo'selected';?> value="0">Thấp hơn giá trị ngưỡng</option>
					    </select>
					  	</div>				    
					</div>
				  </div>

				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Sensor4:</label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control" id="warning-ss1-4" name="warning-ss1-4" placeholder="number" value="@if(isset($sss1)){{$sss1[0]->ss4}}@endif">
				    </div>
				    <div class="col-sm-2">Cảnh báo khi:</div>
				    <div class="col-sm-4">
						<div class="form-group">
					    <select class="form-control" id="warning-sign-ss1-4" name="warning-sign-ss1-4">
					      <option value="1">Cao hơn giá trị ngưỡng</option>
					      <option <?php if(isset($sss1)) if($sss1[0]->ss4_sign == 0 )echo'selected';?> value="0">Thấp hơn giá trị ngưỡng</option>
					    </select>
					  	</div>				    
					</div>
				  </div>
				  <input type="hidden" name="sensor_station" value="1" >	
				  
				</form>
				<div class="form-group row">
				    <div class="col-sm-12">
				      	<button id="btn-warning-sss1" type="" class="btn btn-primary"  >Save</button>
				      	
				    </div>

				  </div>
			</div>
		</div>
		</div>

		<div class=" col-lg-12 card">
			<div class="card-header">
				Reset to default
			</div>
			<div class="card-body">
				<button  id="btn-warning-reset" type="" class="btn btn-primary" >Reset</button>
			</div>
		</div>


		<div class="col-lg-12 card">
			<div class="card-header">List mail</div>
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
						<button id="btn-add-warning-mail" class="btn btn-primary">Add</button>
					</div>
				</div>
				
			</div>
			
		</div>

	</div>	
</div>














</div>

@include ('layouts.script-warning-setup')
@endsection() 	
