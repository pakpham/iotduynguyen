<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ajaxController extends Controller
{
    //
    public function getLoaitin(Request $request){
    	$id_the_loai = $request->the_loai;
    	$data = App\TheLoai::find($id_the_loai)->loaitin;
    	//echo $data;
    	foreach ($data as $value) {
    		echo "<option value='$value->id'>$value->Ten</option>";
    	}
    }
    public function queryData(Request $request){
    	$date_start = $request->date_start." 00:00:00";
    	$date_end = $request->date_end." 00:00:00";
    	$data1 = App\DataSensor::whereBetween('created_at',[$date_start,$date_end])->get();
        $data2 = App\DataSensor2::whereBetween('created_at',[$date_start,$date_end])->get();
        $data3 = App\DataSensor3::whereBetween('created_at',[$date_start,$date_end])->get();
        $data4 = App\DataSensor4::whereBetween('created_at',[$date_start,$date_end])->get();

    	//$temp = App\DataSensor::where("id","1518")->value("created_at");
    	//return $date_start.'===='.$temp;
        $data = [
            "data1"=>$data1,
            "data2"=>$data2,
            "data3"=>$data3,
            "data4"=>$data4,
        ];

    	return $data;
  	}
}
