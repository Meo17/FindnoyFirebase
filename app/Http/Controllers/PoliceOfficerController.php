<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;

class PoliceOfficerController extends Controller
{
	
	public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }


	public function dashboard_police_officer(){
		return view('/PoliceOfficer/dashboard_police_officer');
    }

}