<script type="text/javascript">

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
        } else if(data.message.id_station == 3){
          var ss1 = data.message.ss1;
          var ss2 = data.message.ss2;
          var ss3 = data.message.ss3;
          var ss4 = data.message.ss4;
          var created_at = data.message.created_at;
          //alert(JSON.stringify(data));
          console.log("DATA PUSHER:");
          //console.log(data.name);
          document.getElementById("value-ss1-3").innerHTML = ss1;
          document.getElementById("value-ss2-3").innerHTML = ss2;
          document.getElementById("value-ss3-3").innerHTML = ss3;
          document.getElementById("value-ss4-3").innerHTML = ss4;
          document.getElementById("created-at-3").innerHTML = created_at;
        } else if(data.message.id_station == 4){
          var ss1 = data.message.ss1;
          var ss2 = data.message.ss2;
          var ss3 = data.message.ss3;
          var ss4 = data.message.ss4;
          var created_at = data.message.created_at;
          //alert(JSON.stringify(data));
          console.log("DATA PUSHER:");
          //console.log(data.name);
          document.getElementById("value-ss1-4").innerHTML = ss1;
          document.getElementById("value-ss2-4").innerHTML = ss2;
          document.getElementById("value-ss3-4").innerHTML = ss3;
          document.getElementById("value-ss4-4").innerHTML = ss4;
          document.getElementById("created-at-4").innerHTML = created_at;
        }
      });

      //{"ss1":"11","ss2":"22","ss3":"33","ss4":"44"}	


</script>