<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fbController extends Controller
{
    public function index(){
    	$this -> verifiAccess();
    }
    public function verifiAccess(){
    	//$local_tonken = env('PAGE_ACCESS_TONKEN');
    	$local_tonken = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');
    	$hub_verify_token = request('hub_verify_token');

    	if($hub_verify_token == $local_tonken){
    		echo request('hub_challenge');
    		exit;
    	}

    	
    }
}
