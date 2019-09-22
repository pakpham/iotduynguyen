
<div class="row">
 <div class="col-lg-12">
   <div class="card">  
     <div class="card-body">
      <h4 class="box-title">Biểu đồ dữ liệu trong ngày </h4>
     </div>
       <div class="row container">
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
       <div class="col-lg-12">
         <div class="card-header">Cảm biến 1</div>
         <div class="card-body"> 
           <div id="chartContainer-1" style="height: 300px; width: 100%;"></div>
         </div>
       </div>

       <div class="col-lg-12">
         <div class="card-header">Cảm biến 2</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="chartContainer-2" style="height: 300px; width: 100%;"></div>
         </div>
       </div>

       <div class="col-lg-12">
         <div class="card-header">Cảm biến 3</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <div id="chartContainer-3" style="height: 300px; width: 100%;"></div>
         </div>
       </div>

       <div class="col-lg-12">
         <div class="card-header">Cảm biến 4</div>
         <div class="card-body"> 
           <!-- <canvas id="TrafficChart"></canvas>   -->
           <h1 style="text-align: center; color: gray">NOT FOUND</h1>
         </div>
       </div>
     </div> <!-- /.row --> 
     <div class="card-body"></div>
   </div> 
 </div><!-- /# column -->
</div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
<script type="text/javascript">
var data_temp = [
      { x: new Date(2019, 9, 2,1,2,3), y: 60 },
      { x: new Date(2019, 9, 2,1,3,3), y: 70 },
      { x: new Date(2019, 9, 2,1,4,3), y: 71 },
      { x: new Date(2019, 9, 2,1,5,3), y: 65 },
      { x: new Date(2019, 9, 2,1,6,3), y: 73 },
      { x: new Date(2019, 9, 2,1,7,3), y: 96 },
      { x: new Date(2019, 9, 2,1,8,3), y: 84 },
      { x: new Date(2019, 9, 2,1,2,3), y: 83 },
      { x: new Date(2019, 9, 2,1,2,3), y: 69 },
      { x: new Date(2019, 9, 2,1,2,3), y: 43 },
      { x: new Date(2019, 9, 2,1,2,3), y: 70 },
      { x: new Date(2019, 9, 2,1,2,3), y: 69 },
      { x: new Date(2019, 9, 2,1,2,3), y: 90 },
      { x: new Date(2019, 9, 2,1,2,3), y: 30 }];
</script>



<script>
function dothi() {

var chart1 = new CanvasJS.Chart("chartContainer-1", {
  theme:"light2",
  animationEnabled: true,
  title:{
    text: "Temperature - Sensor 1"
  },
  axisY :{
    includeZero: false,
    title: "Temperature",
    suffix: " °C "
  },
  toolTip: {
    shared: "true"
  },
  legend:{
    cursor:"pointer",
    itemclick : toggleDataSeries1
  },
  data: [{
    type: "spline",
    visible: true,
    showInLegend: true,
    yValueFormatString: "## °C",
    name: "Station 1",
    dataPoints: data_ss11
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: true,
    yValueFormatString: "## °C",
    name: "Station 2",
    dataPoints: data_ss12
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: false,
    yValueFormatString: "## °C",
    name: "Station 3",
    dataPoints: [{x:0,y:0}]
  }]  
});
chart1.render();
function toggleDataSeries1(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  chart1.render();
}



var chart2 = new CanvasJS.Chart("chartContainer-2", {
  theme:"light2",
  animationEnabled: true,
  title:{
    text: "Humidity - Sensor 2"
  },
  axisY :{
    includeZero: false,
    title: "Humidity",
    suffix: " %"
  },
  toolTip: {
    shared: "true"
  },
  legend:{
    cursor:"pointer",
    itemclick : toggleDataSeries2
  },
  data: [{
    type: "spline",
    visible: true,
    showInLegend: true,
    yValueFormatString: "##,00 %",
    name: "Station 1",
    dataPoints: data_ss21
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: true,
    yValueFormatString: "##,00 %",
    name: "Station 2",
    dataPoints: data_ss22
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: false,
    yValueFormatString: "##,00 %",
    name: "Station 3",
    dataPoints: [{x:0,y:0}]
  }]  
});
chart2.render();
function toggleDataSeries2(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  chart2.render();
}

var chart3 = new CanvasJS.Chart("chartContainer-3", {
  theme:"light2",
  animationEnabled: true,
  title:{
    text: "Humidity - Sensor 3"
  },
  axisY :{
    includeZero: false,
    title: "Humidity",
    suffix: " %"
  },
  toolTip: {
    shared: "true"
  },
  legend:{
    cursor:"pointer",
    itemclick : toggleDataSeries3
  },
  data: [{
    type: "spline",
    visible: true,
    showInLegend: true,
    yValueFormatString: "##,00 %",
    name: "Station 1",
    dataPoints: data_ss31
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: true,
    yValueFormatString: "##,00 %",
    name: "Station 2",
    dataPoints: data_ss32
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: false,
    yValueFormatString: "##,00 %",
    name: "Station 3",
    dataPoints: [{x:0,y:0}]
  }]  
});
chart3.render();
function toggleDataSeries3(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  chart3.render();
}

}
</script>