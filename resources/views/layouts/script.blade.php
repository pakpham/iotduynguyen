 
<script>
  var date_now = Date("yyyy-mm-dd");
  var data_ss;
  // var data_ss11=[], data_ss21=[], data_ss31 = [], data_ss41=[];
  // var data_ss12=[], data_ss22=[], data_ss32 = [], data_ss42=[];

  // var data_ss13=[], data_ss23=[], data_ss33 = [], data_ss43=[];
  // var data_ss14=[], data_ss24=[], data_ss34 = [], data_ss44=[];

  var data_ss11=[], data_ss12=[], data_ss13 = [], data_ss14=[];
  var data_ss21=[], data_ss22=[], data_ss23 = [], data_ss24=[];
  var data_ss31=[], data_ss32=[], data_ss33 = [], data_ss34=[];
  var data_ss41=[], data_ss42=[], data_ss43 = [], data_ss44=[];


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
  
  


  function queryData(){
    date_start = document.getElementById('date-start').value;
    date_end = document.getElementById('date-end').value;
    console.log(date_start+'==='+date_end);
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
      })
        
      }

      function sapxepDulieu(dulieu){
        var data1 = dulieu.data1;
        var data2 = dulieu.data2;
        var data3 = dulieu.data3;
        var data4 = dulieu.data4;

        // SAP XEP DU LIEU STATION 1
        for (var i = 0; i <data1.length; i++) {
          data_ss11[i] = {x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss1)} 
          data_ss12[i] = {x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss2)} 
          data_ss13[i] = {x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss3)} 
          data_ss14[i] = {x: sapxepNgay(data1[i].created_at), y: Number(data1[i].ss4)} 
        };
        // SAP XEP DU LIEU STATION 2
        for (var i = 0; i <data2.length; i++) {
          data_ss21[i] = {x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss1)} 
          data_ss22[i] = {x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss2)} 
          data_ss23[i] = {x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss3)} 
          data_ss24[i] = {x: sapxepNgay(data2[i].created_at), y: Number(data2[i].ss4)} 
        };
        // SAP XEP DU LIEU STATION 3
        for (var i = 0; i <data3.length; i++) {
          data_ss31[i] = {x: sapxepNgay(data3[i].created_at), y: Number(data3[i].ss1)} 
          data_ss32[i] = {x: sapxepNgay(data3[i].created_at), y: Number(data3[i].ss2)} 
          data_ss33[i] = {x: sapxepNgay(data3[i].created_at), y: Number(data3[i].ss3)} 
          data_ss34[i] = {x: sapxepNgay(data3[i].created_at), y: Number(data3[i].ss4)} 
        };
        // SAP XEP DU LIEU STATION 4
        for (var i = 0; i <data4.length; i++) {
          data_ss41[i] = {x: sapxepNgay(data4[i].created_at), y: Number(data4[i].ss1)} 
          data_ss42[i] = {x: sapxepNgay(data4[i].created_at), y: Number(data4[i].ss2)} 
          data_ss43[i] = {x: sapxepNgay(data4[i].created_at), y: Number(data4[i].ss3)} 
          data_ss44[i] = {x: sapxepNgay(data4[i].created_at), y: Number(data4[i].ss4)} 
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


    
