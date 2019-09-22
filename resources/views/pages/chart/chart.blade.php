
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


<div class="container">
  <div class="card">
         <div class="card-header">Cảm biến 1</div>
         <div class="card-body"> 
           <div id="chartContainer" style="height: 100%; width: 100%;"></div>
         </div>
    
  </div>
</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
<script type="text/javascript">
function dothi() {
var chart = new CanvasJS.Chart("chartContainer-1", {
  animationEnabled: true,
  title:{
    text: "Temperature"
  },
  toolTip: {
    shared: true
  },

  axisX: {
    title: "Time",
    suffix : " s"
  },
  axisY: {
    title: "Temperature",
    titleFontColor: "#4F81BC",
    suffix : " °C",
    lineColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
  axisY2: {
    title: "Distance",
    titleFontColor: "#C0504E",
    suffix : " m",
    lineColor: "#C0504E",
    tickColor: "#C0504E"
  },
  data: [{
    type: "spline",
    name: "Station 1",
    xValueFormatString: "'Day:'DD h'h'm'm's's'",
    yValueFormatString: "#,## °C",
    dataPoints: data_ss11
  },
  {
    type: "spline",  
    name: "Station 2",
    xValueFormatString: "'Day:'DD h'h'm'm's's'",
    yValueFormatString: "#,##0.00 °C",
    dataPoints: data_ss12
  }]
});

var chart2 = new CanvasJS.Chart("chartContainer-2", {
  animationEnabled: true,
  title:{
    text: "Humidity"
  },
  toolTip: {
    shared: true
  },
  axisX: {
    title: "Time",
    suffix : " s"
  },
  axisY: {
    title: "Speed",
    titleFontColor: "#4F81BC",
    suffix : " %",
    lineColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
  axisY2: {
    title: "Distance",
    titleFontColor: "#C0504E",
    suffix : " m",
    lineColor: "#C0504E",
    tickColor: "#C0504E"
  },
  data: [{
    type: "spline",
    name: "Station 1",
    xValueFormatString: "'Day:'DD h'h'm'm's's'",
    yValueFormatString: "#,##0.00 %",
    dataPoints: data_ss21
  },
  {
    type: "spline",  
    name: "Station 2",
    xValueFormatString: "'Day:'DD h'h'm'm's's'",
    yValueFormatString: "#,##0.00 %",
    dataPoints: data_ss22
  }]
});

var chart3 = new CanvasJS.Chart("chartContainer-3", {
  animationEnabled: true,
  title:{
    text: "Humidity"
  },
  toolTip: {
    shared: true
  },
  axisX: {
    title: "Time",
    suffix : " s"
  },
  axisY: {
    title: "Speed",
    titleFontColor: "#4F81BC",
    suffix : " %",
    lineColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
  axisY2: {
    title: "Distance",
    titleFontColor: "#C0504E",
    suffix : " m",
    lineColor: "#C0504E",
    tickColor: "#C0504E"
  },
  data: [{
    type: "spline",
    name: "Station 1",
    xValueFormatString: "'Day:'DD h'h'm'm's's'",
    yValueFormatString: "#,##0.00 %",
    dataPoints: data_ss31
  },
  {
    type: "spline",  
    name: "Station 2",
    xValueFormatString: "'Day:'DD h'h'm'm's's'",
    yValueFormatString: "#,##0.00 %",
    dataPoints: data_ss32
  }]
});

chart.render();
chart2.render();
chart3.render();
}
</script>



<script type="text/javascript">
function dothi() {
 var chart = new CanvasJS.Chart("chartContainer-temp", {
   theme: 'light2',
   animationEnabled: true,
   title:{
   text: "Graph of Salinity"
   },
   axisY :{
   includeZero: false,
   title: "salinity (ppm)",
   suffix: ""
   },
   toolTip: {
   shared: "true"
   },
   legend:{
   cursor:"pointer",
   itemclick : toggleDataSeries
   },
   data: [{
   type: "spline",
   visible: true,
   showInLegend: true,
   yValueFormatString: "##.0 ppm",
   name: "Salinity",
   dataPoints: data_ss11,
   },
   {
   type: "spline",
   visible: true,
   showInLegend: true,
   yValueFormatString: "##.0 ppm",
   name: "Salinity",
   dataPoints: data_ss12,
   }]
 });
 chart.render();
 function toggleDataSeries(e) {
   if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
   e.dataSeries.visible = false;
   } else {
   e.dataSeries.visible = true;
   }
   chart.render();
 } 
 }
</script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme:"light2",
  animationEnabled: true,
  title:{
    text: "Game of Thrones Viewers of the First Airing on HBO"
  },
  axisY :{
    includeZero: false,
    title: "Number of Viewers",
    suffix: "mn"
  },
  toolTip: {
    shared: "true"
  },
  legend:{
    cursor:"pointer",
    itemclick : toggleDataSeries
  },
  data: [{
    type: "spline",
    visible: false,
    showInLegend: true,
    yValueFormatString: "##.00mn",
    name: "Season 1",
    dataPoints: [
      { label: "Ep. 1", y: 2.22 },
      { label: "Ep. 2", y: 2.20 },
      { label: "Ep. 3", y: 2.44 },
      { label: "Ep. 4", y: 2.45 },
      { label: "Ep. 5", y: 2.58 },
      { label: "Ep. 6", y: 2.44 },
      { label: "Ep. 7", y: 2.40 },
      { label: "Ep. 8", y: 2.72 },
      { label: "Ep. 9", y: 2.66 },
      { label: "Ep. 10", y: 3.04 }
    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    visible: false,
    yValueFormatString: "##.00mn",
    name: "Season 2",
    dataPoints: [
      { label: "Ep. 1", y: 3.86 },
      { label: "Ep. 2", y: 3.76 },
      { label: "Ep. 3", y: 3.77 },
      { label: "Ep. 4", y: 3.65 },
      { label: "Ep. 5", y: 3.90 },
      { label: "Ep. 6", y: 3.88 },
      { label: "Ep. 7", y: 3.69 },
      { label: "Ep. 8", y: 3.86 },
      { label: "Ep. 9", y: 3.38 },
      { label: "Ep. 10", y: 4.20 }
    ]
  },
  {
    type: "spline",
    visible: false,
    showInLegend: true,
    yValueFormatString: "##.00mn",
    name: "Season 3",
    dataPoints: [
      { label: "Ep. 1", y: 4.37 },
      { label: "Ep. 2", y: 4.27 },
      { label: "Ep. 3", y: 4.72 },
      { label: "Ep. 4", y: 4.87 },
      { label: "Ep. 5", y: 5.35 },
      { label: "Ep. 6", y: 5.50 },
      { label: "Ep. 7", y: 4.84 },
      { label: "Ep. 8", y: 4.13 },
      { label: "Ep. 9", y: 5.22 },
      { label: "Ep. 10", y: 5.39 }
    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.00mn",
    name: "Season 4",
    dataPoints: [
      { label: "Ep. 1", y: 6.64 },
      { label: "Ep. 2", y: 6.31 },
      { label: "Ep. 3", y: 6.59 },
      { label: "Ep. 4", y: 6.95 },
      { label: "Ep. 5", y: 7.16 },
      { label: "Ep. 6", y: 6.40 },
      { label: "Ep. 7", y: 7.20 },
      { label: "Ep. 8", y: 7.17 },
      { label: "Ep. 9", y: 6.95 },
      { label: "Ep. 10", y: 7.09 }
    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.00mn",
    name: "Season 5",
    dataPoints: [
      { label: "Ep. 1", y: 8 },
      { label: "Ep. 2", y: 6.81 },
      { label: "Ep. 3", y: 6.71 },
      { label: "Ep. 4", y: 6.82 },
      { label: "Ep. 5", y: 6.56 },
      { label: "Ep. 6", y: 6.24 },
      { label: "Ep. 7", y: 5.40 },
      { label: "Ep. 8", y: 7.01 },
      { label: "Ep. 9", y: 7.14 },
      { label: "Ep. 10", y: 8.11 }
    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.00mn",
    name: "Season 6",
    dataPoints: [
      { label: "Ep. 1", y: 7.94 },
      { label: "Ep. 2", y: 7.29 },
      { label: "Ep. 3", y: 7.28 },
      { label: "Ep. 4", y: 7.82 },
      { label: "Ep. 5", y: 7.89 },
      { label: "Ep. 6", y: 6.71 },
      { label: "Ep. 7", y: 7.80 },
      { label: "Ep. 8", y: 7.60 },
      { label: "Ep. 9", y: 7.66 },
      { label: "Ep. 10", y: 8.89 }
    ]
  },
  {
    type: "spline", 
    showInLegend: true,
    yValueFormatString: "##.00mn",
    name: "Season 7",
    dataPoints: [
      { label: "Ep. 1", y: 10.11 },
      { label: "Ep. 2", y: 9.27 },
      { label: "Ep. 3", y: 9.25 },
      { label: "Ep. 4", y: 10.17 },
      { label: "Ep. 5", y: 10.72 },
      { label: "Ep. 6", y: 10.24 },
      { label: "Ep. 7", y: 12.07 }
    ]
  }]
});
chart.render();

function toggleDataSeries(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  chart.render();
}

}
</script>