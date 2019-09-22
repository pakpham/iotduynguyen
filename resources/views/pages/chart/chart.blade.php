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
    title: "Speed",
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
    yValueFormatString: "#,##0.00 °C",
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

