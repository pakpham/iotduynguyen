        <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
       <script>
        var data_ss, data_ss1=[], data_ss2=[], data_ss3 = [], data_ss4=[];
        var d = new Date();
        var date_start = d.getFullYear()+"-"+d.getMonth()+"-" + d.getDate()+ " 00:00:00";
        var date_end = d.getFullYear()+"-"+d.getMonth()+"-" + d.getDate()+ " 23:59:59";
        var temp1 = new Array();
//==============================================================================
        function drawChart(){
              // Traffic Chart using chartist
              if ($('#traffic-chart-1').length) {
                  var chart = new Chartist.Line('#traffic-chart-1', {
                    //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [
                    data_ss1
                   // [0, 33000, 15000,  20000,  15000,  300]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                      showGrid: true
                  }
              });

                  chart.on('draw', function(data) {
                      if(data.type === 'line' || data.type === 'area') {
                          data.element.animate({
                              d: {
                                  begin: 2000 * data.index,
                                  dur: 2000,
                                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                  to: data.path.clone().stringify(),
                                  easing: Chartist.Svg.Easing.easeOutQuint
                              }
                          });
                      }
                  });
              }
              //22222222222222222222222222222222222222222222222222222222222//
              if ($('#traffic-chart-2').length) {
                  var chart = new Chartist.Line('#traffic-chart-2', {
                    //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [[],
                    data_ss2
                   // [0, 33000, 15000,  20000,  15000,  300]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                      showGrid: true
                  }
              });

                  chart.on('draw', function(data) {
                      if(data.type === 'line' || data.type === 'area') {
                          data.element.animate({
                              d: {
                                  begin: 2000 * data.index,
                                  dur: 2000,
                                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                  to: data.path.clone().stringify(),
                                  easing: Chartist.Svg.Easing.easeOutQuint
                              }
                          });
                      }
                  });
              }

              //3333333333333333333333333333333333333333333333333333333333333//
              if ($('#traffic-chart-3').length) {
                  var chart = new Chartist.Line('#traffic-chart-3', {
                    //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [[],[],
                    data_ss3
                   // [0, 33000, 15000,  20000,  15000,  300]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                      showGrid: true
                  }
              });

                  chart.on('draw', function(data) {
                      if(data.type === 'line' || data.type === 'area') {
                          data.element.animate({
                              d: {
                                  begin: 2000 * data.index,
                                  dur: 2000,
                                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                  to: data.path.clone().stringify(),
                                  easing: Chartist.Svg.Easing.easeOutQuint
                              }
                          });
                      }
                  });
              }
              //4444444444444444444444444444444444444444444444444444444444//
              if ($('#traffic-chart-4').length) {
                  var chart = new Chartist.Line('#traffic-chart-4', {
                    //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [[],[],[],
                    data_ss4
                   // [0, 33000, 15000,  20000,  15000,  300]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                      showGrid: true
                  }
              });
                  chart.on('draw', function(data) {
                      if(data.type === 'line' || data.type === 'area') {
                          data.element.animate({
                              d: {
                                  begin: 2000 * data.index,
                                  dur: 2000,
                                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                  to: data.path.clone().stringify(),
                                  easing: Chartist.Svg.Easing.easeOutQuint
                              }
                          });
                      }
                  });
              }
            }
//===========================================================================

        function forEach(array, action){
          for(var i = 0; i < array.length; i++)
            action(array[i]);
        }

        jQuery(document).ready(function($) {
            "use strict"; 
            $.ajax({
                url: "{{route('get-data-home')}}",
                type: 'POST',
                //cache: false,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': 1
                },
                success: function(data){
                    //var getData = $.parseJSON(data);
                    //console.log(data[0].ss1);
                    var i = 0, data_temp = [];
                    
                    forEach(data, function(value){
                        data_ss1[i] = value.ss1;
                        data_ss2[i] = value.ss2;
                        data_ss3[i] = value.ss3;
                        data_ss4[i] = value.ss4;
                        ++i;
                    });
                    drawChart();
                },
                error: function (){
                    alert('Có lỗi xảy ra');
                }
            });
            drawChart();
        }); 
  
      Pusher.logToConsole = true;
      var pusher = new Pusher('a51f96b99684c0b3c2c6', {
        cluster: 'ap1',
        forceTLS: true
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        var ss1 = data.message.ss1;
        var ss2 = data.message.ss2;
        var ss3 = data.message.ss3;
        var ss4 = data.message.ss4;
        var created_at = data.message.created_at;
        //alert(JSON.stringify(data));
        console.log("DATA PUSHER:");
        //console.log(data.name);
        document.getElementById("value-ss1").innerHTML = ss1;
        document.getElementById("value-ss2").innerHTML = ss2;
        document.getElementById("value-ss3").innerHTML = ss3;
        document.getElementById("value-ss4").innerHTML = ss4;
        document.getElementById("created-at").innerHTML = created_at;
      });


      //{"ss1":"11","ss2":"22","ss3":"33","ss4":"44"}

      $('.datepicker-start').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '-3d'
      });
      $('.datepicker-end').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '-3d'
      });


      function sapxepDulieu($dulieu){
        for (var i = 0; i <data_ss.length; i++) {
          data_ss1[i]  = data_ss[i].ss1;
          data_ss2[i]  = data_ss[i].ss2;
          data_ss3[i]  = data_ss[i].ss3;
          data_ss4[i]  = data_ss[i].ss4;
        };
      };
      function queryData(){
        date_start = document.getElementById('date-start').value;
        date_end = document.getElementById('date-end').value;
        console.log(date_start+'==='+date_end);
        //$('#form-query-data').submit();
        //$('#form-query-data').get("/query-data", function(){});
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
           type:'GET',
           url:'query-data',
           data:{date_start:date_start, date_end:date_end},
           success:function(data){
              console.log(data);
              data_ss =  data;
              sapxepDulieu(data_ss);
              drawChart();
           }
        });
      }
    </script>


  
