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
    $this->warningMail($data);
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
    //return var_dump($data);
  }


  public function warningMail($sensor_value){
    $id_station = $sensor_value ->id_station;
    $warning = App\WarningSetup::where('id_station',$id_station)->get();
    $warning_value = $warning[0];
    $sensor_over = array(
        "sensor_over_1"=> 0,
        "sensor_over_2"=> 0,
        "sensor_over_3"=> 0,
        "sensor_over_4"=> 0,
    );
    $sensor_over = (object) $sensor_over;

    if($warning_value->ss1_sign==1 AND $sensor_value->ss1 >= $warning_value->ss1){
        $sensor_over->sensor_over_1 = 1;
    }if ($warning_value->ss1_sign==0 AND $sensor_value->ss1 <= $warning_value->ss1) {
        $sensor_over->sensor_over_1 = 1;
    }if($warning_value->ss2_sign==1 AND $sensor_value->ss2 >= $warning_value->ss2){
        $sensor_over->sensor_over_2 = 1;
    }if ($warning_value->ss2_sign==0 AND $sensor_value->ss2 <= $warning_value->ss2) {
        $sensor_over->sensor_over_2 = 1;
    }if($warning_value->ss3_sign==1 AND $sensor_value->ss3 >= $warning_value->ss3){
        $sensor_over->sensor_over_3 = 1;
    }if ($warning_value->ss3_sign==0 AND $sensor_value->ss3 <= $warning_value->ss3) {
        $sensor_over->sensor_over_3 = 1;
    }if($warning_value->ss4_sign==1 AND $sensor_value->ss4 >= $warning_value->ss4){
        $sensor_over->sensor_over_4 = 1;
    }if ($warning_value->ss4_sign==0 AND $sensor_value->ss4 <= $warning_value->ss4) {
        $sensor_over->sensor_over_4 = 1;
    }


    if($sensor_over->sensor_over_1 OR $sensor_over->sensor_over_2 OR $sensor_over->sensor_over_3 OR $sensor_over->sensor_over_4){

        $list_warning_mail = App\WarningMail::select('mail')->get();
        $list_mail = [];
        $temp = ['pakpham@gmail.com','anhkhuong975@gmail.com'];
        for ($i=0; $i <count($list_warning_mail) ; $i++) { 
            $list_mail[$i] = $list_warning_mail[$i]->mail;
        }

        if($id_station == 1){
            Mail::send('mail-warning', array('warning_value'=>$sensor_value,'sensor_over'=>$sensor_over),function($message) use ($list_mail){
          $message->to($list_mail)->subject('WARNING');});
        }
        if($id_station ==3) {
            Mail::send('mail-warning-3', array('warning_value'=>$sensor_value,'sensor_over'=>$sensor_over),function($message) use ($list_mail){
          $message->to($list_mail)->subject('WARNING');});
        }
       
    }else{
        //echo "DON'T SEND WARNING!";
    }

  }


}
