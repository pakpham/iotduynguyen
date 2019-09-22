 
      <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
       <script>
        var date_now = Date("yyyy-mm-dd");
        var data_ss;
        var data_ss11=[], data_ss21=[], data_ss31 = [], data_ss41=[];
        var data_ss12=[], data_ss22=[], data_ss32 = [], data_ss42=[];

        var d = new Date();
        var date_start = d.getFullYear()+"-"+d.getMonth()+"-" + d.getDate()+ " 00:00:00";
        var date_end = d.getFullYear()+"-"+d.getMonth()+"-" + d.getDate()+ " 23:59:59";
        var temp1 = new Array();


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
                },
                error: function (){
                    alert('Có lỗi xảy ra');
                }
            });
        }); 
  
      Pusher.logToConsole = true;
      var pusher = new Pusher('a51f96b99684c0b3c2c6', {
        cluster: 'ap1',
        forceTLS: true
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        if (data.message.id_station == 1) {
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
        } else if(data.message.id_station == 2){
          var ss1 = data.message.ss1;
          var ss2 = data.message.ss2;
          var ss3 = data.message.ss3;
          var ss4 = data.message.ss4;
          var created_at = data.message.created_at;
          //alert(JSON.stringify(data));
          console.log("DATA PUSHER:");
          //console.log(data.name);
          document.getElementById("value-ss1-2").innerHTML = ss1;
          document.getElementById("value-ss2-2").innerHTML = ss2;
          document.getElementById("value-ss3-2").innerHTML = ss3;
          document.getElementById("value-ss4-2").innerHTML = ss4;
          document.getElementById("created-at-2").innerHTML = created_at;
        }
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
              resetData();
              data_ss = data
              sapxepDulieu(data_ss);
              window.onload = dothi();
              document.getElementById("down-data").classList.remove("disabled");
           }
        });
      }

      function sapxepDulieu(dulieu){
        data1 = dulieu.data1;
        data2 = dulieu.data2;

        // DATA SENSOR OF CHART 1 (SENSOR 1)
        for (var i = 0; i <data1.length; i++) {
          data_ss11[i] = {
            x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss1)
          } 
        };
        for (var i = 0; i <data2.length; i++) {
          data_ss12[i] = {
            x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss1)
          } 
        }; 

        // DATA SENSOR OF CHART 2 (SENSOR 2)
        for (var i = 0; i <data1.length; i++) {
          data_ss21[i] = {
            x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss2)
          } 
        };
        for (var i = 0; i <data2.length; i++) {
          data_ss22[i] = {
            x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss2)
          } 
        }; 

        //DATA SENSOR OF CHART 3 (SENSOR 3)
        for (var i = 0; i <data1.length; i++) {
          data_ss31[i] = {
            x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss3)
          } 
        };
        for (var i = 0; i <data2.length; i++) {
          data_ss32[i] = {
            x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss3)
          } 
        }; 

      };


      function resetData(){
        data_ss = [];
        data_ss11 = [];data_ss12 = [];
        data_ss21 = [];data_ss22 = [];
        data_ss31 = [];data_ss32 = [];
        data_ss41 = [];data_ss42 = [];
      }
      function sapxepNgay(dulieu){
        //var ngay = new Date(dulieu.slice(0,4),dulieu.slice(5,7),dulieu.slice(8,10),dulieu.slice(11,13),dulieu.slice(14,16),dulieu.slice(17,19));
        var ngay = new Date(2019,9,dulieu.slice(8,10),dulieu.slice(11,13),dulieu.slice(14,16),dulieu.slice(17,19));
        return ngay;
      }

    </script>



<script type="text/javascript">
      // .. DOWNLOAD DU LIEU
      function dowData(){
        date_start = document.getElementById('date-start').value;
        date_end = document.getElementById('date-end').value;
        console.log(date_start+'==='+date_end);
        var urldown = "http://iotduynguyen.cf/public/admin/export-data/"+date_start+"/"+date_end;
        console.log(urldown);
        window.location.href = urldown;
      }
</script>


  
