<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;

class warningController extends Controller
{
    public function warningSetup(){
    	$warning1 = App\WarningSetup::where('id_station',1)->get();
    	$warning2 = App\WarningSetup::where('id_station',2)->get();
    	$warning3 = App\WarningSetup::where('id_station',3)->get();
    	$warning4 = App\WarningSetup::where('id_station',4)->get();


    	return view('pages.warning-setup',['sss1'=>$warning1,'sss2'=>$warning2,'sss3'=>$warning3,'sss4'=>$warning4]);
    }

    public function setWarningSSS1(Request $request){
    	$request = (object)$request->warning_value;
    	$warning = App\WarningSetup::where('id_station',$request->id_station)->update([
    		'ss1' 	=>	$request->warning_ss1_1,
    		'ss2'	=>	$request->warning_ss1_2,
    		'ss3'	=>	$request->warning_ss1_3,
    		'ss4'	=>	$request->warning_ss1_4,
    		'ss1_sign'	=>	$request->warning_sign_ss1_1,
    		'ss2_sign'	=>	$request->warning_sign_ss1_2,
    		'ss3_sign'	=>	$request->warning_sign_ss1_3,
    		'ss4_sign'	=>	$request->warning_sign_ss1_4,
    	]);
    	return $warning;
    }
     public function setWarningSSS2(Request $data){
    	return $data;
    }
     public function setWarningSSS3(Request $data){
    	return $data;
    }
     public function setWarningSSS4(Request $data){
    	return $data;
    }



    public function resetWarning(Request $request){
   		App\WarningSetup::get()->each->delete();
    	$warning =  New App\WarningSetup();
    	$warning2 =  New App\WarningSetup();
    	$warning3 =  New App\WarningSetup();
    	$warning4 =  New App\WarningSetup();

    	$warning->ss1 = 100;
    	$warning->ss2 = 100;
    	$warning->ss3 = 100;
    	$warning->ss4 = 100;
    	$warning->ss1_sign = 1;
    	$warning->ss2_sign = 1;
    	$warning->ss3_sign = 1;
    	$warning->ss4_sign = 1;
    	$warning->id_station = 1;
    	$warning -> save();

    	$warning2->ss1 = 100;
    	$warning2->ss2 = 100;
    	$warning2->ss3 = 100;
    	$warning2->ss4 = 100;
    	$warning2->ss1_sign = 1;
    	$warning2->ss2_sign = 1;
    	$warning2->ss3_sign = 1;
    	$warning2->ss4_sign = 1;
    	$warning2->id_station = 2;
    	$warning2 -> save();
    	
    	$warning3->ss1 = 100;
    	$warning3->ss2 = 100;
    	$warning3->ss3 = 100;
    	$warning3->ss4 = 100;
    	$warning3->ss1_sign = 1;
    	$warning3->ss2_sign = 1;
    	$warning3->ss3_sign = 1;
    	$warning3->ss4_sign = 1;
    	$warning3->id_station = 3;
    	$warning3 -> save();

    	$warning4->ss1 = 100;
    	$warning4->ss2 = 100;
    	$warning4->ss3 = 100;
    	$warning4->ss4 = 100;
    	$warning4->ss1_sign = 1;
    	$warning4->ss2_sign = 1;
    	$warning4->ss3_sign = 1;
    	$warning4->ss4_sign = 1;
    	$warning4->id_station = 4;
    	$warning4 -> save();
    	
    	return "DONE";
    }

    public function test(){
    	return "test";
    }
}
