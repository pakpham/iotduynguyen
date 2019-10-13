<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class addDataSensor extends Controller
{
    public function addDataSensor(Request $request){
    $data = New App\DataSensor();
    $data->ss1 = $request -> data1;
    $data->ss2 = $request -> data2; 
    $data->ss3 = $request -> data3;
    $data->ss4 = $request -> data4;
    //$data_rt =  new \stdClass();
    $data->id_station = 1;
    $data->save();
    //return "Saved to DataBase ";
    event(new App\Events\PusherEvent($data));
    //return $data->created_at;
  }
  public function addDataSensor2(Request $request){
    $data = New App\DataSensor2();
    $data->ss1 = $request -> data1;
    $data->ss2 = $request -> data2; 
    $data->ss3 = $request -> data3;
    $data->ss4 = $request -> data4;
    //$data_rt = new \stdClass();
    $data->id_station = 2;
    $data->save();
    //return "Saved to DataBase ";
    event(new App\Events\PusherEvent($data));
    //return $data->created_at;
  }

  public function addDataSensor3(Request $request){
    $data = New App\DataSensor3();
    $data->ss1 = $request -> data1;
    $data->ss2 = $request -> data2; 
    $data->ss3 = $request -> data3;
    $data->ss4 = $request -> data4;
    //$data_rt =  new \stdClass();
    $data->id_station = 3;
    $data->save();
    //return "Saved to DataBase ";
    event(new App\Events\PusherEvent($data));
    //return $data->created_at;
  }
  public function addDataSensor4(Request $request){
    $data = New App\DataSensor4();
    $data->ss1 = $request -> data1;
    $data->ss2 = $request -> data2; 
    $data->ss3 = $request -> data3;
    $data->ss4 = $request -> data4;
    //$data_rt = new \stdClass();
    $data->id_station = 4;
    $data->save();
    //return "Saved to DataBase ";
    event(new App\Events\PusherEvent($data));
    return var_dump($data);
  }


}
