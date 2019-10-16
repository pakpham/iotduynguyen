<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test form</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div style="text-align: center; border: 3px; border-style: solid; ; border-radius: 30px">
        <h1>The Monitoring Portal of IoT-based Sensor Stations for <br>Gardening Activities</h1>
        <h3 style="color: red">
            
        </h3>
        <div style="text-align: left;">

            <ul>
                <li>Sensor Station: <span style="color: blue">
                @if(isset($warning_value))
                {{
                    $warning_value->id_station
                }}
                @endif
                </span>
                </li>
                <li>Time: <span style style="color: blue">
                @if(isset($warning_value))
                {{
                    $warning_value->created_at
                }}
                @endif 
                </span>
                </li>
                <li>Sensor Value: 
                    <ul>
                        <li>Air Humidity: <span style="color: blue">{{$warning_value->ss1}} %</span>
                            @if($sensor_over->sensor_over_1 == 1)
                                <span style='color: red'>(WARNING)</span>
                            @endif
                        </li>
                        <li>Air Temperature: <span style="color: blue">{{$warning_value->ss2}} °C</span>
                            @if($sensor_over->sensor_over_2 == 1)
                                <span style='color: red'>(WARNING)</span>
                            @endif
                        </li>
                        <li>Soil Moisture: <span style="color: blue">{{$warning_value->ss3}} %</span>
                            @if($sensor_over->sensor_over_3 == 1)
                                "<span style='color: red'>(WARNING)</span>"
                            @endif
                        </li>
                        <li>Soil Temperature: <span style="color: blue">{{$warning_value->ss4}} °C</span>
                            @if($sensor_over->sensor_over_4 == 1)
                                <span style='color: red'>(WARNING)</span>
                            @endif
                        </li>
                    </ul>
                </li>
                <br><hr>
                <li>INFO:
                    <i>
                        <ul style="color: blue;">
                            <li>Nguyen Huynh Anh Duy</li>
                            <li>College of Engineering Technology - Can Tho University</li>
                            <li>http://iot.duy-nguyen.com</li>
                        </ul>
                    </i>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
