<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class homeController extends Controller
{
    public function getHome(){
        // Ngay hom nay la:
    	// $date_from = date("Y-m-d") . " 00:00:00";
    	// $date_to   = date("Y-m-d") . " 23:59:59";
 

    	$data_station1 = App\DataSensor::latest('created_at')->first();
    	$data_station2 = App\DataSensor2::latest('created_at')->first();
    	$data_station3 = App\DataSensor3::latest('created_at')->first();
    	$data_station4 = App\DataSensor4::latest('created_at')->first();


    	$data_home = [
    		'data_station1'=>$data_station1,
    		'data_station2'=>$data_station2,
    		'data_station3'=>$data_station3,
    		'data_station4'=>$data_station4
    	];
    	return view('pages.home',$data_home);
    }
}
