<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Mail;

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
    $this->warningMail($data);
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


  public function warningMail($sensor_value){
    $id_station = $sensor_value ->id_station;
    $warning = App\WarningSetup::where('id_station',$id_station)->get();
    $warning_value = $warning[0];



    if($warning_value->ss1_sign==1 AND $sensor_value->ss1 >= $warning_value->ss1){
        Mail::send('mail-warning', array('name'=>'name','email'=>'email', 'content'=>'content'),function($message){
          $message->to('pakpham@gmail.com', 'Khuong')->subject('WARNING STATION 1');});
        echo "SEND EMAIL!";
    } elseif ($warning_value->ss1_sign==0 AND $sensor_value->ss1 <= $warning_value->ss1) {
        Mail::send('mail-warning', array('name'=>'name','email'=>'email', 'content'=>'content'),function($message){
          $message->to('pakpham@gmail.com', 'Khuong')->subject('WARNING STATION 1');});
        echo "SEND EMAIL!";
    }



    else{
        echo "DON'T SEND WARNING!";
    }

  }


}
