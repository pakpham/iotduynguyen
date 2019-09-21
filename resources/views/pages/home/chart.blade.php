<div class="row">
 <div class="col-lg-12">
   <div class="card">  
     <div class="card-body">
      <h4 class="box-title">Biểu đồ dữ liệu trong ngày </h4>
     </div>
       <div class="row">
          <div class="col-lg-8">
            <form method="get" action="query-data" id="form-query-data">
              <div class="row">
                <div class="col-lg-3">
                  <input class="datepicker-start" data-date-format="mm/dd/yyyy" id="date-start" name="date_start" value="TODAY">
                </div>
                <div class="col-lg-3">
                  <input class="datepicker-end" data-date-format="mm/dd/yyyy" id="date-end"  name="date_end" value="TODAY">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-2">
            <button button type="button" class="btn btn-sm btn-primary" onclick="queryData()">Vẽ Biểu Đồ</button>
          </div>
          <div class="col-lg-2">
            <button  type="button" class="btn btn-primary btn-sm disabled" onclick="dowData()"  id="down-data">Tải Dữ Liệu</button>
          </div>
        </div>
      <hr>
     <div class="row"> 
       <div class="col-lg-6">
         <div class="card-header">Cảm biến 1</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-1" class="traffic-chart"></div>
         </div>
       </div>

       <div class="col-lg-6">
         <div class="card-header">Cảm biến 2</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-2" class="traffic-chart"></div>
         </div>
       </div>

       <div class="col-lg-6">
         <div class="card-header">Cảm biến 3</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-3" class="traffic-chart"></div>
         </div>
       </div>

       <div class="col-lg-6">
         <div class="card-header">Cảm biến 4</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="traffic-chart-4" class="traffic-chart"></div>
         </div>
       </div>
     </div> <!-- /.row --> 
     <div class="card-body"></div>
   </div> 
 </div><!-- /# column -->
</div>



<div class="clearfix"></div>
<div class="orders">
 <div class="row">
   <div class="col-xl-8"> 
     <div class="card">
       <div class="card-body">
         <h4 class="box-title">Cập nhật gần đây nhất </h4>
       </div>
       <div class="card-body--">
         <div class="table-stats order-table ov-h">
            @if(isset($last_data))
           <table class="table ">
             <thead>
               <tr>
                 <th>Cảm biến</th>
                 <th>{{$last_data[4]->created_at}}</th>
                 <th>{{$last_data[3]->created_at}}</th>
                 <th>{{$last_data[2]->created_at}}</th>
                 <th>{{$last_data[1]->created_at}}</th>
                 <th>{{$last_data[0]->created_at}}</th>
                 <th>Đơn vị</th>
               </tr>
             </thead>
             <tbody> 
               <tr class=" pb-0">
                <td class="number">1</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss1}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

               <tr class=" pb-0">
                <td class="number">2</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss2}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

               <tr class=" pb-0">
                <td class="number">3</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss3}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

               <tr class=" pb-0">
                <td class="number">4</td>
                @foreach($last_data as $value)
                 <td class="number">{{$value->ss4}}</td>
                @endforeach
                  <td>
                   <span class="badge badge-complete">C</span>
                 </td>
               </tr>

             </tbody>
           </table>
           @endif
         </div> <!-- /.table-stats -->
       </div>
     </div> <!-- /.card -->
   </div>

   <div class="col-xl-4"> 
     <div class="card">
       <div class="card-body">
         <h4 class="box-title">Giá trị trung bình  </h4>
       </div>
       <div class="card-body--">
         <div class="table-stats order-table ov-h">
          @if(isset($data_avg))
           <table class="table ">
             <thead>
               <tr>
                 <th>SS</th>
                 <th>Today</th>
                 <th>1</th>
                 <th>2</th>
                 <th style="text-align: left;">3</th>
               </tr>
             </thead>
             <tbody> 
               <tr class=" pb-0">
                <td class="number">1</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss1}}</td>
                @endforeach
                
               </tr>

               <tr class=" pb-0">
                <td class="number">2</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss2}}</td>
                @endforeach
                
               </tr>

               <tr class=" pb-0">
                <td class="number">3</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss3}}</td>
                @endforeach
                  
               </tr>

               <tr class=" pb-0"> 
                <td class="number">4</td>
                @foreach($data_avg as $value)
                 <td class="number">{{$value->ss4}}</td>
                @endforeach
               </tr>

             </tbody>
           </table>
          @endif
         </div> <!-- /.table-stats -->
       </div>
     </div> <!-- /.card -->
   </div>
</div> 
</div>

<div class="container">
  <div class="card">
    <div  class="card-header">CHART</div>
    <div class="card-body">
      <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
  </div>
</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

var temp_k =  [
      { x: new Date(2017,6,24), y: 20 },
      { x: new Date(2017,6,25), y: 20 },
      { x: new Date(2017,6,26), y: 25 },
      { x: new Date(2017,6,27), y: 25 },
      { x: new Date(2017,6,28), y: 25 },
      { x: new Date(2017,6,29), y: 25 },
      { x: new Date(2017,6,30), y: 25 }
    ]

function dothi() {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "Daily High Temperature at Different Beaches"
  },
  axisX: {
    valueFormatString: "DD MMM,YY"
  },
  axisY: {
    title: "Temperature (in °C)",
    includeZero: false,
    suffix: " °C"
  },
  legend:{
    cursor: "pointer",
    fontSize: 16,
    itemclick: toggleDataSeries
  },
  toolTip:{
    shared: true
  },
  data: [{
    name: "Myrtle Beach",
    type: "spline",
    yValueFormatString: "#0.## °C",
    showInLegend: true,
    dataPoints: data_ss11,
  },
  {
    name: "Martha Vineyard",
    type: "spline",
    yValueFormatString: "#0.## °C",
    showInLegend: true,
    dataPoints: data_ss12,
  }]
});
chart.render();

function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}

}


</script>