<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;

class SolvedCaseController extends Controller
{

	public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }

    public function missing(Request $request){
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $missing  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request))
                    ->orderByChild("status")
                    ->equalTo("inactive")
                    ->getValue();
          return view('/SolvedCases/missing',
              [
                  'userInfo' => $userInfo,
                  'missing' => $missing,
               ]
          );
        } else {
          return redirect('/');
        }   	
    }

    public function criminal(Request $request) {
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $criminal  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                    ->orderByChild("status")
                    ->equalTo("inactive")
                    ->getValue();
          return view('/SolvedCases/criminal',
              [
                  'userInfo' => $userInfo,
                  'criminal' => $criminal,
               ]
          );
        } else {
          return redirect('/');
        } 
    }

    public function vehicle(Request $request) {
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $vehicle  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request))
                    ->orderByChild("status")
                    ->equalTo("inactive")
                    ->getValue();
          return view('/SolvedCases/vehicle',
              [
                  'userInfo' => $userInfo,
                  'vehicle' => $vehicle,
               ]
          );
        } else {
          return redirect('/');
        } 
    }
}
