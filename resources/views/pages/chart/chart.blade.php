
<div class="row">
 <div class="col-lg-12">
   <div class="card">  
     <div class="card-body">
      <h4 class="box-title">{{trans('home.bieudodulieu')}} </h4>
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
       <div class="card-header">{{trans('home.cambien1')}}</div>
       <div class="card-body"> 
         <div id="chartContainer-1" style="height: 300px; width: 100%;"></div>
       </div>
     </div>

     <div class="col-lg-12">
       <div class="card-header">{{trans('home.cambien2')}}</div>
       <div class="card-body"> 
         <!-- <canvas id="TrafficChart"></canvas>   -->
         <div id="chartContainer-2" style="height: 300px; width: 100%;"></div>
       </div>
     </div>

     <div class="col-lg-12">
       <div class="card-header">{{trans('home.cambien3')}}</div>
       <div class="card-body"> 
         <!-- <canvas id="TrafficChart"></canvas>   -->
         <div id="chartContainer-3" style="height: 300px; width: 100%;"></div>
       </div>
     </div>

     <div class="col-lg-12">
       <div class="card-header">{{trans('home.cambien4')}}</div>
       <div class="card-body"> 
         <!-- <canvas id="TrafficChart"></canvas>   -->
          <div id="chartContainer-4" style="height: 300px; width: 100%;"></div> 
        </div>
     </div>
   </div> <!-- /.row --> 
   <div class="card-body"></div>
 </div> 
</div><!-- /# column -->
</div>



<!-- JAVASCRIPT INIT -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
<script type="text/javascript">
  //var d = new Date();
  //var date_1 = d.getFullYear().toString() +"-"+ d.getMonth().toString()+"-"+d.getDate().toString();
  //var date_2 = d.getFullYear().toString() +"-"+ d.getMonth().toString()+"-"+d.getDate().toString();
  //document.getElementById('date-start').value = date_1;
  //document.getElementById('date-end').value = date_2;
  $(document).ready(function(){
      $('.datepicker-start').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '-3d'
      });
      $('.datepicker-end').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '-3d'
      });
  });
</script>
<!-- --- END JS INIT --- -->


<script>
  function dothi() {
    // Bieu do Station 1
    var chart1 = new CanvasJS.Chart("chartContainer-1", {
      title:{
        text: "SENSOR STATION 1"
      },
      axisY:[{
        title: "Air Humidity",
        lineColor: "#C24642",
        tickColor: "#C24642",
        labelFontColor: "#C24642",
        titleFontColor: "#C24642",
        suffix: "%"
      },
      {
        title: "Air Temperature",
        lineColor: "#369EAD",
        tickColor: "#369EAD",
        labelFontColor: "#369EAD",
        titleFontColor: "#369EAD",
        suffix: "°C"
      }],
      axisY2: [{
        title: "Soil Moisture",
        lineColor: "#7F6084",
        tickColor: "#7F6084",
        labelFontColor: "#7F6084",
        titleFontColor: "#7F6084",
        suffix: "%"
      },
      {
        title: "Soil Temperature",
        lineColor: "#FFF100",
        tickColor: "#FFF100",
        labelFontColor: "#FFF100",
        titleFontColor: "#FFF100",
        suffix: "°C"
      }],

      toolTip: {
        shared: true
      },
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries1
      },
      data: [{
        type: "line",
        name: "Air Humidity",
        color: "#369EAD",
        yValueFormatString: "### '%'",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss11
      },
      {
        type: "line",
        name: "Air Temperature",
        color: "#C24642",
        yValueFormatString: "### °C",
        axisYIndex: 0,
        showInLegend: true,
        dataPoints: data_ss12
      },
      {
        type: "line",
        name: "Soil Moisture",
        color: "#7F6084",
        axisYType: "secondary",
        yValueFormatString: "### '%'",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss13
      },{
        type: "line",
        name: "Soil Temperature",
        color: "#FFF100",
        axisYType: "secondary",
        yValueFormatString: "### °C",
        showInLegend: true,
        axisYIndex: 0,
        dataPoints: data_ss14
      }]
    });
    chart1.render();
    function toggleDataSeries1(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }

    // Bieu do Station 2
    var chart2 = new CanvasJS.Chart("chartContainer-2", {
      title:{
        text: "SENSOR STATION 2"
      },
      axisY:[{
        title: "Air Humidity",
        lineColor: "#C24642",
        tickColor: "#C24642",
        labelFontColor: "#C24642",
        titleFontColor: "#C24642",
        suffix: "%"
      },
      {
        title: "Air Temperature",
        lineColor: "#369EAD",
        tickColor: "#369EAD",
        labelFontColor: "#369EAD",
        titleFontColor: "#369EAD",
        suffix: "°C"
      }],
      axisY2: [{
        title: "Soil Moisture",
        lineColor: "#7F6084",
        tickColor: "#7F6084",
        labelFontColor: "#7F6084",
        titleFontColor: "#7F6084",
        suffix: "%"
      },
      {
        title: "Soil Temperature",
        lineColor: "#FFF100",
        tickColor: "#FFF100",
        labelFontColor: "#FFF100",
        titleFontColor: "#FFF100",
        suffix: "°C"
      }],

      toolTip: {
        shared: true
      },
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries2
      },
      data: [{
        type: "line",
        name: "Air Humidity",
        color: "#369EAD",
        yValueFormatString: "### '%'",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss21
      },
      {
        type: "line",
        name: "Air Temperature",
        color: "#C24642",
        yValueFormatString: "### °C",
        axisYIndex: 0,
        showInLegend: true,
        dataPoints: data_ss22
      },
      {
        type: "line",
        name: "Soil Moisture",
        color: "#7F6084",
        axisYType: "secondary",
        yValueFormatString: "### '%'",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss23
      },{
        type: "line",
        name: "Soil Temperature",
        color: "#FFF100",
        axisYType: "secondary",
        yValueFormatString: "### °C",
        showInLegend: true,
        axisYIndex: 0,
        dataPoints: data_ss24
      }]
    });
    chart2.render();
    function toggleDataSeries2(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }

    // Bieu do Station 3
    var chart3 = new CanvasJS.Chart("chartContainer-3", {
      title:{
        text: "SENSOR STATION 3"
      },
      axisY:[{
        title: "Altitude",
        lineColor: "#C24642",
        tickColor: "#C24642",
        labelFontColor: "#C24642",
        titleFontColor: "#C24642",
        suffix: "m"
      },
      {
        title: "Temperature",
        lineColor: "#369EAD",
        tickColor: "#369EAD",
        labelFontColor: "#369EAD",
        titleFontColor: "#369EAD",
        suffix: "°C"
      }],
      axisY2: [{
        title: "Soil Moisture",
        lineColor: "#7F6084",
        tickColor: "#7F6084",
        labelFontColor: "#7F6084",
        titleFontColor: "#7F6084",
        suffix: "%"
      },
      {
        title: "Air Pressure",
        lineColor: "#FFF100",
        tickColor: "#FFF100",
        labelFontColor: "#FFF100",
        titleFontColor: "#FFF100",
        suffix: "Pa"
      }],

      toolTip: {
        shared: true
      },
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries3
      },
      data: [{
        type: "line",
        name: "Altitude",
        color: "#369EAD",
        yValueFormatString: "### m",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss31
      },
      {
        type: "line",
        name: "Temperature",
        color: "#C24642",
        yValueFormatString: "### °C",
        axisYIndex: 0,
        showInLegend: true,
        dataPoints: data_ss32
      },
      {
        type: "line",
        name: "Soil Moisture",
        color: "#7F6084",
        axisYType: "secondary",
        yValueFormatString: "### '%'",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss33
      },{
        type: "line",
        name: "Air Pressure",
        color: "#FFF100",
        axisYType: "secondary",
        yValueFormatString: "### Pa",
        showInLegend: true,
        axisYIndex: 0,
        dataPoints: data_ss34
      }]
    });
    chart3.render();
    function toggleDataSeries3(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }

    // Bieu do Station 4
    var chart4 = new CanvasJS.Chart("chartContainer-4", {
      title:{
        text: "SENSOR STATION 4"
      },
      axisY:[{
        title: "Altitude",
        lineColor: "#C24642",
        tickColor: "#C24642",
        labelFontColor: "#C24642",
        titleFontColor: "#C24642",
        suffix: "m"
      },
      {
        title: "Temperature",
        lineColor: "#369EAD",
        tickColor: "#369EAD",
        labelFontColor: "#369EAD",
        titleFontColor: "#369EAD",
        suffix: "°C"
      }],
      axisY2: [{
        title: "Soil Moisture",
        lineColor: "#7F6084",
        tickColor: "#7F6084",
        labelFontColor: "#7F6084",
        titleFontColor: "#7F6084",
        suffix: "%"
      },
      {
        title: "Air Pressure",
        lineColor: "#FFF100",
        tickColor: "#FFF100",
        labelFontColor: "#FFF100",
        titleFontColor: "#FFF100",
        suffix: "Pa"
      }],

      toolTip: {
        shared: true
      },
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries4
      },
      data: [{
        type: "line",
        name: "Altitude",
        color: "#369EAD",
        yValueFormatString: "### m",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss41
      },
      {
        type: "line",
        name: "Temperature",
        color: "#C24642",
        yValueFormatString: "### °C",
        axisYIndex: 0,
        showInLegend: true,
        dataPoints: data_ss42
      },
      {
        type: "line",
        name: "Soil Moisture",
        color: "#7F6084",
        axisYType: "secondary",
        yValueFormatString: "### '%'",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: data_ss43
      },{
        type: "line",
        name: "Air Pressure",
        color: "#FFF100",
        axisYType: "secondary",
        yValueFormatString: "### Pa",
        showInLegend: true,
        axisYIndex: 0,
        dataPoints: data_ss44
      }]
    });
    chart4.render();
    function toggleDataSeries4(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }
  }
</script>









<script>

</script>