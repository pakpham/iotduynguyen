<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Zalo\Zalo;
use App;



class pakController extends Controller
{

  // Thu nghiem ZALO API
  // ZALO Flatform USNING Zalo API
  public function testZalo (){
    $config = array(
      'app_id' => '1066360202307558771',
      'app_secret' => 'W6VFDXSqRf4VmwG28bbL',
      'callback_url' => 'http://a34ab1aa.ngrok.io/iotduynguyen/public/zalo-logined'
    );
    $zalo = new Zalo($config);
    $helper = $zalo -> getRedirectLoginHelper();
    $callBackUrl = 'http://a34ab1aa.ngrok.io/iotduynguyen/public/zalo-logined';
    $loginUrl = $helper->getLoginUrl($callBackUrl); // This is login url
   
    echo $loginUrl; 
  }

  public function sendMesengerZalo(){

    // KHOI TAO
    $config = array(
      'app_id' => '1066360202307558771',
      'app_secret' => 'W6VFDXSqRf4VmwG28bbL',
      'callback_url' => 'http://a34ab1aa.ngrok.io/iotduynguyen/public/zalo-logined'
    );
    $zalo = new Zalo($config);
    $helper = $zalo -> getRedirectLoginHelper();


    // LAY OAUTH CODE
    $oauthCode = isset($_GET['code']) ? $_GET['code'] : "THIS NOT CALLBACK PAGE !!!"; // get oauthoauth code from url params
    $url = "https://oauth.zaloapp.com/v3/access_token?app_id=1066360202307558771&app_secret=W6VFDXSqRf4VmwG28bbL&code=z0oQQ6oFKpxd0-rqOfWPGeujy1fOcpzDmIM04sh1PKJ0ShyYVFy4PFuMutikaWac_ox0Uc2jQ3JdTB5XJyPj0_XDr4L-qmbScc-n873KPtxkQS4RKBC3GFn4oW5kiIi9jdIwVdtzJ2QxMkCWVB040uHufZKyo65HYL3FB2VF1W7Z2-XTBAHHGlL6l44Rp1jAzsN7B4xpUcZVSimsRz5P4gL-pHHdbMK7YHxY2ZYuI3V4RwiWMl5X68vZYaXUsNi9pcVJ3YJfNXxLpu9BMbTuEDlwfIf_JdrAkSQ6T5dJKm3KExzDfqq562drYql9725-Q8IhCzfL2decySi6uZ1tDJhXlIMG2nO3Nbacn9YpO7llTWe";

    // LAY TOKEN
    $token_result = file_get_contents($url);
    $token_result =  json_decode($token_result);
    $access_token = $token_result->access_token;
    $expires_in =  $token_result->expires_in;


    // LAY THONG TIN NGUOI DUNG
    //https://graph.zalo.me/v2.0/me?access_token=<User_Access_Token>&fields=id,birthday,name,gender,picture
    $url_user_infor = "https://graph.zalo.me/v2.0/me?access_token=" .$access_token. "&fields=id,birthday,name,gender,picture";
    $user_info_result = file_get_contents($url_user_infor);
    $user_info_result =  json_decode($user_info_result);


    //Lay Danh Sach Ban Be
    //https://graph.zalo.me/v2.0/me/invitable_friends?access_token=<User_Access_Token>&from=0&limit=5&fields=id,name,gender,picture
    $url_list_frienfs = "https://graph.zalo.me/v2.0/me/invitable_friends?access_token=".$access_token."&from=0&limit=5&fields=id,name,gender,picture";
    $list_friends = file_get_contents($url_list_frienfs);
    $list_friends =  json_decode($list_friends);



    // GUI TIN NHAN DEN BAN BE - MOI DUNG UNG DUNG
    // ID VD: 1597673233736807076
    // URL: "https://graph.zalo.me/v2.0/apprequests?access_token=<USER_ACCESS_TOKEN>&message=Thử thách bản thân với các bài toán kỹ thuật hóc búa&to=friend_id"

    $message = "Hi";
    $id_user = "1597673233736807076";
    $url_send_mess_to_friend = "https://graph.zalo.me/v2.0/apprequests?access_token=".$access_token."&message=&to=".$id_user;
    $send_mess_to_friens_result = file_get_contents($url_send_mess_to_friend);
    $send_mess_to_friens_result = json_decode($send_mess_to_friens_result);


    return var_dump($send_mess_to_friens_result);
    //return gettype($list_friends);
  }
  





 
  public function queryData(Request $request){
    return $request;
  }

  public function addUser ($name, $pass){
    $data = New App\User();
    $data->name = $name;
    $data->email = $name.'@gmail.com';
    $data->password = bcrypt($pass);
    $data->save();
    echo "Da them User!";
  }
  public function getTest (){
    $test = App\Test::get();
    Excel::create('Filename', function($excel) {

    })->export('xls');
    //return $test;
  }
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

  
  public function addData(Request $request){
    return $request->name;
  }
  public function getHome(){
    

    //$last_id = App\DataSensor::get()->last();   
    $date_from = date("Y-m-d") . " 00:00:00";
    $date_to   = date("Y-m-d") . " 23:59:59";

    $date_from_1 = date('Y-m-d',strtotime($date_from. '-1 days')). " 00:00:00";
    $date_to_1 = date('Y-m-d',strtotime($date_to. '-1 days')). " 23:59:59"; 
    $date_from_2 = date('Y-m-d',strtotime($date_from. '-2 days')). " 00:00:00";
    $date_to_2 = date('Y-m-d',strtotime($date_to. '-2 days')). " 23:59:59"; 
    $date_from_3 = date('Y-m-d',strtotime($date_from. '-3 days')). " 00:00:00";
    $date_to_3 = date('Y-m-d',strtotime($date_to. '-3 days')). " 23:59:59"; 


    $data = App\DataSensor::whereBetween('created_at', [$date_from, $date_to]) -> orderBy('id')->get();
    $data_1 = App\DataSensor::whereBetween('created_at', [$date_from_1, $date_to_1]) -> orderBy('id')->get();
    
    $data_2 = App\DataSensor::whereBetween('created_at', [$date_from_2, $date_to_2]) -> orderBy('id')->get();
    $ss1_2 = $data_2->avg('ss1'); $ss2_2 = $data_2->avg('ss2'); 
    $ss3_2 = $data_2->avg('ss3'); $ss4_2 = $data_2->avg('ss4');
    $data_3 = App\DataSensor::whereBetween('created_at', [$date_from_3, $date_to_3]) -> orderBy('id')->get();


    ////////////////////    STATETION 2   /////////////////////////
    $data2 = App\DataSensor2::whereBetween('created_at', [$date_from, $date_to]) -> orderBy('id')->get();
    // $data2_1 = App\DataSensor2::whereBetween('created_at', [$date_from_1, $date_to_1]) -> orderBy('id')->get();
    
    // $data2_2 = App\DataSensor2::whereBetween('created_at', [$date_from_2, $date_to_2]) -> orderBy('id')->get();
    // $ss21_2 = $data2_2->avg('ss1'); $ss2_2 = $data_2->avg('ss2'); 
    // $ss23_2 = $data2_2->avg('ss3'); $ss4_2 = $data_2->avg('ss4');
    // $data2_3 = App\DataSensor::whereBetween('created_at', [$date_from_3, $date_to_3]) -> orderBy('id')->get();
    /////////////////       END STATETION 2    ////////////////


    $obj = New App\DataSensor;
    $obj_1 = New App\DataSensor;
    $obj_2 = New App\DataSensor;
    $obj_3 = New App\DataSensor;

    $obj->ss1 = round($data->avg('ss1'));
    $obj->ss2 = round($data->avg('ss2'));
    $obj->ss3 = round($data->avg('ss3'));
    $obj->ss4 = round($data->avg('ss4'));
    $obj_1->ss1 = round($data->avg('ss1'));
    $obj_1->ss2 = round($data->avg('ss2'));
    $obj_1->ss3 = round($data->avg('ss3'));
    $obj_1->ss4 = round($data->avg('ss4'));
    $obj_2->ss1 = round($data->avg('ss1'));
    $obj_2->ss2 = round($data->avg('ss2'));
    $obj_2->ss3 = round($data->avg('ss3'));
    $obj_2->ss4 = round($data->avg('ss4'));
    $obj_3->ss1 = round($data->avg('ss1'));
    $obj_3->ss2 = round($data->avg('ss2'));
    $obj_3->ss3 = round($data->avg('ss3'));
    $obj_3->ss4 = round($data->avg('ss4'));
    $data_avg = [
      $obj, $obj_1, $obj_2, $obj_3
    ];
    $last_data;
    $last_data_2;
    if($data->count() > 0 ){
      $last_id = $data[$data->count()-1]->id;
      for ($i = 4; $i >=0 ; $i--) { 
        $last_data[$i] = App\DataSensor::where('id','=',$last_id-$i)->get()[0];
      }

      //////  Last Data Station 2 ///////////
      $last_id_2 = $data2[$data2->count()-1]->id;
      for ($i = 4; $i >=0 ; $i--) { 
        $last_data_2[$i] = App\DataSensor2::where('id','=',$last_id_2-$i)->get()[0];
      }
      /////  End last Data Station 2 /////////


      //event(new App\Events\PusherEvent("UPDATE RealTime Controller using Pusher API "));
      return view ('pages.home', ['last_data' => $last_data, 'last_data_2'=>$last_data_2, 'data_avg'=>$data_avg]);
    }else{
      $last_data = [];
      return view('pages.home',['data_avg'=>$data_avg]);
    }   
  }

  // AJAXXXXXXXXXXXXXXXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  public function getDataHome(){
    $date_from = date("Y-m-d") . " 00:00:00";
    $date_to   = date("Y-m-d") . " 23:59:59";
    $data = App\DataSensor::whereBetween('created_at', [$date_from, $date_to])->get();
    //$data =  App\DataSensor::get();
    return $data;
  }


  // LOGIN AND LOGOUT
  public function handlingLogin(Request $request) {
    $user_name = $request->name;
    $pass = $request->password;

    if(Auth::attempt(['name'=>$user_name, 'password'=>$pass])){
      return view('pages.logined',['user'=> Auth::user()]);
      //$user => Auth::user();
    }
    else
      return view('pages.login',['error'=>'Dang nhap khong thanh cong']);
  }

  public function logout(){
    Auth::logout();
    return view('pages.login');
  }

  public function checkLogin (){
    if (Auth::check()){
      return view('pages.logined');
    }
    else echo "Ban chua dang nhap";
  }

  ///////////////////////////////////////////////////////
      public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {
        return Excel::download(new UsersExport, 'data-sensor.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }


    public function changeLanguage($language)
    {
      \Session::put('locale', $language);
      return redirect()->back();
    }
}
