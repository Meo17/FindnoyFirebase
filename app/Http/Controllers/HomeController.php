<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\SystemConfigureController;

use RealRashid\SweetAlert\Facades\Alert;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController extends Controller
{
    //
    public function __construct(){
        $this->database = FirebaseService::connect();
        $this->session = new SystemConfigureController;
    }
    
    #homepage of police station
    public function homepage(Request $request) {
        $userInfo   =  $this->session->getSessionLoginSuperAdmin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
         $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
          return view('/Dashboard/home_superadmin',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }
    
    //add police station display view from route 
    public function add_police_station(Request $request) {
          $userInfo   =  $this->session->getSessionLoginSuperAdmin($request);
          $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
          $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;
          
          if (!empty($email) && !empty($pas)) {
              return view('/PoliceStation/add_police_station',
                  ['userInfo' => $userInfo ]
              );

          } else {
              return redirect('/');
          }
    }

    //list  police station display view from route 
    public function list_police_station(Request $request) {
          $userInfo   =  $this->session->getSessionLoginSuperAdmin($request);
          $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
          $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;
          
          if (!empty($email) && !empty($pas)) {
            $list_police_station  = $this->database->getReference('police_station')
                                  ->orderByChild("status")
                                  ->equalTo("active")
                                  ->getValue();
            return view('/PoliceStation/list_police_station',
                [
                    'userInfo' => $userInfo,
                    'list_police_station' => $list_police_station,
                ]
            );
          } else {
            return redirect('/');
          }
    }

    public function store(Request $req){
          //get all data from police station 
          $defaultAuth = Firebase::auth();
          $id_region = $req['id_region'];
          $id_province = $req['id_province'];

          // change to name
          if ($id_province == 0 ) {
              $finalNameProv = "Tagbilaran City"; 
          } else if ( $id_province == 1) {
              $finalNameProv = "Bogo City"; 
          } else if ( $id_province == 2) {
              $finalNameProv = "Carcar City"; 
          } else if ( $id_province == 3) {
              $finalNameProv = "Cebu City"; 
          } else if ( $id_province == 4) {
              $finalNameProv = "Danao City"; 
          } else if ( $id_province == 5) {
              $finalNameProv = "Lapu-Lapu City"; 
          } else if ( $id_province == 6) {
              $finalNameProv = "Mandaue City"; 
          } else if ( $id_province == 7) {
              $finalNameProv = "Naga City"; 
          } else if ( $id_province == 8) {
              $finalNameProv = "Talisay City"; 
          } else if ( $id_province == 9) {
              $finalNameProv = "Bais City"; 
          } else if ( $id_province == 10) {
              $finalNameProv = "Bayawan City"; 
          } else if ( $id_province == 11) {
              $finalNameProv = "Bais City"; 
          } else if ( $id_province == 12) {
              $finalNameProv = "Canlaon City"; 
          } else if ( $id_province == 13) {
              $finalNameProv = "Dumaguete City"; 
          } else if ( $id_province == 14) {
              $finalNameProv = "Guihulngan City"; 
          } else if ( $id_province == 14 ) {
              $finalNameProv = "Tanjay City"; 
          } else if ( $id_province == 15) {
              $finalNameProv = "Toledo City"; 
          }

          $id_city = $req['id_city']; // change id_city to name
          //Alcantara
          if ($id_city == 0) {
              $finalNameCity = "Alcantara";
          }
          else if ($id_city == 1) {   
            $finalNameCity = "Alcoy";
          }
          else if ($id_city == 2) {
            $finalNameCity = "Alegria";
          }
            else if ($id_city == 3) {
            $finalNameCity = "Aloguinsan";
          }
            else if ($id_city == 4) {
            $finalNameCity = "Argao";
          }
          else if ($id_city == 5) {
            $finalNameCity = "Asturias";
          }
          else if ($id_city == 6) {
            $finalNameCity = "Badian";
          }
          else if ($id_city == 7) {
            $finalNameCity = "Balamban";
          }
          else if ($id_city == 8) {
            $finalNameCity = "Bogo";
          }
          else if ($id_city == 9) {
            $finalNameCity = "Bantayan";
          }
          else if ($id_city == 10) {
            $finalNameCity = "Barili";
          }
          else if ($id_city == 11) {
            $finalNameCity = "Boljoon";
          }
          else if ($id_city == 12) {
            $finalNameCity = "Borbon";
          }
          else if ($id_city == 13) {
            $finalNameCity = "Carcar";
          }
          else if ($id_city == 14) {
            $finalNameCity = "Carmen";
          }
          else if ($id_city == 15) {
            $finalNameCity = "Catmon";
          }
          else if ($id_city == 16) {
            $finalNameCity = "Cebu";
          }
          else if ($id_city == 17) {
            $finalNameCity = "Compostela";
          }
          else if ($id_city == 18) {
            $finalNameCity = "Consolation";
          }
          else if ($id_city == 19) {
            $finalNameCity = "Cordova";
          }
          else if ($id_city == 20) {
            $finalNameCity = "Daan Bantayan";
          }
          else if ($id_city == 21) {
            $finalNameCity = "Dalaguete";
          }
          else if ($id_city == 22) {
            $finalNameCity = "Danao";
          }
          else if ($id_city == 23) {
            $finalNameCity = "Dumangjug";
          }
          else if ($id_city == 24) {
            $finalNameCity = "Ginatilan";
          }
          else if ($id_city == 25) {
            $finalNameCity = "Lapu-Lapu";
          }
          else if ($id_city == 26) {
            $finalNameCity = "Liloan";
          }
          else if ($id_city == 27) {
            $finalNameCity = "Madridejos";
          }
          else if ($id_city == 28) {
            $finalNameCity = "Malabuyoc";
          }
          else if ($id_city == 29) {
            $finalNameCity = "Mandaue City";
          }
          else if ($id_city == 30) {
            $finalNameCity = "Medellin";
          }
          else if ($id_city == 31) {
            $finalNameCity = "Minglanilla";
          }
          else if ($id_city == 32) {
            $finalNameCity = "Moalboal";
          }
          else if ($id_city == 33) {
            $finalNameCity = "Naga City";
          }
          else if ($id_city == 34) {
            $finalNameCity = "Oslob";
          }
          else if ($id_city == 35) {
            $finalNameCity = "Pilar";
          }
          else if ($id_city == 36) {
            $finalNameCity = "Pinamungajan";
          }
          else if ($id_city == 37) {
            $finalNameCity = "Poro";
          }
          else if ($id_city == 38) {
            $finalNameCity = "Ronda";
          }
          else if ($id_city == 39) {
            $finalNameCity = "Samboan";
          }
          else if ($id_city == 40) {
            $finalNameCity = "San Fernando";
          }
          else if ($id_city == 41) {
            $finalNameCity = "San Francisco";
          }
          else if ($id_city == 42) {
            $finalNameCity = "San Remigio";
          }
          else if ($id_city == 43) {
            $finalNameCity = "Santa Fe";
          }
          else if ($id_city == 44) {
            $finalNameCity = "Santander";
          }
          else if ($id_city == 45) {
            $finalNameCity = "Sibonga";
          }
          else if ($id_city == 46) {
            $finalNameCity = "Sogod";
          }
          else if ($id_city == 47) {
            $finalNameCity = "Tabugon";
          }
          else if ($id_city == 48) {
            $finalNameCity = "Tabuelan";
          }
          else if ($id_city == 49) {
            $finalNameCity = "Talisay";
          }
          else if ($id_city == 50) {
            $finalNameCity = "Toledo";
          }
          else if ($id_city == 51) {
            $finalNameCity = "Tuburan";
          }
          else if ($id_city == 52) {
            $finalNameCity = "Tudela";
          }


          $id_station_name = $req['id_station_name']; 
          if ($id_station_name == 0) {
              $finalStationName = "Parian Police Station";
          }
          else if ($id_station_name == 1) {
              $finalStationName = "Osmena Blvd. Police Station";
          }
          else if ($id_station_name == 2) {
              $finalStationName = "Waterfront Police Station";
          }
          else if ($id_station_name == 3) {
              $finalStationName = "Mabolo Police Station";
          }
          else if ($id_station_name == 4) {
              $finalStationName = "Carbon Police Station";
          }
          else if ($id_station_name == 5) {
              $finalStationName = "Pasil Police Station";
          }
          else if ($id_station_name == 6) {
              $finalStationName = "Pardo Police Station";
          }
          else if ($id_station_name == 7) {
              $finalStationName = "Talamban Police Station";
          }
          else if ($id_station_name == 8) {
              $finalStationName = "Guadalupe Police Station";
          }
          else if ($id_station_name == 9) {
              $finalStationName = "Punta Police Station";
          }
          else if ($id_station_name == 10) {
              $finalStationName = "Mambaling Police Station";
          }

          $id_station_num = $req['id_station_num']; 
          if ($id_station_num == 0) {
              $finalStationNumber = "Station 1";
          }
          else if ($id_station_num == 1) {
              $finalStationNumber = "Station 2";
          }
          else if ($id_station_num == 2) {
              $finalStationNumber = "Station 3";
          }
          else if ($id_station_num == 3) {
              $finalStationNumber = "Station 4";
          }
          else if ($id_station_num == 4) {
              $finalStationNumber = "Station 5";
          }
          else if ($id_station_num == 5) {
              $finalStationNumber = "Station 6";
          }
          else if ($id_station_num == 6) {
              $finalStationNumber = "Station 7";
          }
          else if ($id_station_num == 7) {
              $finalStationNumber = "Station 8";
          }
          else if ($id_station_num == 8) {
              $finalStationNumber = "Station 9";
          }
          else if ($id_station_num == 9) {
              $finalStationNumber = "Station 10";
          }
          else if ($id_station_num == 10) {
              $finalStationNumber = "Station 11";
          }

          $floatingZip = $req['floatingZip'];
          $id_email = $req['id_email'];

          $defaultPass = substr(md5(mt_rand()), 0, 8);


          $addUser = [
              'email' =>  $id_email,
              'password' =>  $defaultPass,
          ];

          $createdUser =  $defaultAuth->createUser($addUser);
          $this->session->mailConfig($id_email, $defaultPass);

          if(!empty($createdUser->uid)) {
            //save data all  from inputs 
            $this->database
                ->getReference('police_station')
                ->push([
                    'id_region' => $id_region,
                    'id_province'=> $finalNameProv,
                    'id_city' => $finalNameCity,
                    'uid' => $createdUser->uid,
                    'defaultPass' => $defaultPass,
                    'zip'=>$floatingZip,
                    'email' => $id_email,
                    'station_name' => $finalStationName,
                    'station_num' => $finalStationNumber,
                    'created_datetime' => date('Y-m-d H:i:s'),
                    'modify_datetime' => "",
                    'status' => "active",
              ]);
                
            // example:
            toast('Successfully Save!!','success');
            return redirect('/list_police_station');
          } else {
             toast('Please fill all input fields !! ','error');
            return redirect('/add_police_station');
          }
    }

    //list of inactive function
    public function inactive_police_station(Request $request){
          $userInfo   =  $this->session->getSessionLoginSuperAdmin($request);
          $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
          $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;
          
          if (!empty($email) && !empty($pas)) {
            $list_police_station  = $this->database->getReference('police_station')
                                    ->orderByChild("status")
                                    ->equalTo("inactive")
                                    ->getValue();
            return view('/PoliceStation/deactivated',
                [
                    'userInfo' => $userInfo,
                    'deactivated' => $list_police_station,
                ]
            );
          } else {
            return redirect('/');
          }
    }

    #inactive account of stations
    public function p_deactivate(Request $request){
        $auth = Firebase::auth();
        $id = $request->input('id');
        $ref = $this->database->getReference('police_station/'.$id);
        $get_uid  = $ref->getValue();
        $stationName = $get_uid['station_num'] . " " .$get_uid['station_name'];
        $ref2 = $this->database->getReference('police_officers/'.$get_uid['uid'])->getValue();  

        if(!empty($ref2)) {
          foreach ($ref2 as $key => $value) {
              $auth->disableUser($value['uid']);

              $fullname = $value['rank_add_field_officers']." " .  $value['lname_add_field_officers'];

              $this->session->mailDeactivatePoliceStationAccount($value['email'], $fullname,$stationName);
              $this->database
                ->getReference('police_officers/'.$get_uid['uid'].'/'.$key)
                ->update([
                    'status' => "inactive" ,
                    'modify_datetime' => date('Y-m-d H:i:s'),
                ]);
          }

        }

        if (!empty($get_uid)) {
  
              $user = $auth->disableUser($get_uid['uid']);
              if ($user == true)  {
                $this->database
                  ->getReference('police_station/'.$id)
                  ->update([
                      'status' => "inactive" ,
                      'modify_datetime' => date('Y-m-d H:i:s'),
                  ]);

              $this->session->mailDisabledAccount($get_uid['email'], $stationName);
              toast('Successfully Deactivated !! ','success');

              return redirect('/list_police_station');
            }   
            
        }  
    } 

    #active  the station
    public function p_activate(Request $request){
        $auth = Firebase::auth();
        $id = $request->input('id');
        $ref = $this->database->getReference('police_station/'.$id);
        $get_uid  = $ref->getValue();
        $stationName = $get_uid['station_num'] . " " .$get_uid['station_name'];
        $ref2 = $this->database->getReference('police_officers/'.$get_uid['uid'])->getValue(); 

        if(!empty($ref2)) {
          foreach ($ref2 as $key => $value) {
            $auth->enableUser($value['uid']);
            $this->database
              ->getReference('police_officers/'.$get_uid['uid'].'/'.$key)
              ->update([
                  'status' => "active" ,
                  'modify_datetime' => date('Y-m-d H:i:s'),
              ]);
          }
        } 

        if (!empty($get_uid)) {
              $user = $auth->enableUser($get_uid['uid']);
              if ($user == true)  {
                $this->database
                  ->getReference('police_station/'.$id)
                  ->update([
                      'status' => "active" ,
                      'modify_datetime' => date('Y-m-d H:i:s'),
                  ]);
              $this->session->mailActivateAccount($get_uid['email'], $stationName);
              toast('Successfully Activated !!','success');
              return redirect('/inactive_police_station');
            }   
        }  
    } 

    // Roorts in Wanted Criminal
    public function graphWantedPersonDailyReport() {
    }

    public function graphWantedPersonMonthlyReport() {
    }

    public function graphWantedPersonYearlyReport() {  
    }
    //end 

    // Roorts in Missing Person
    public function graphMissingPersonDailyReport() {
    }

    public function graphMissingPersonMonthlyReport() {
    }

    public function graphMissingPersonYearlyReport() {  
    }
    //end 


    // Roorts in Missing Person
    public function graphCarnappedDailyReport() {
    }

    public function graphCarnappedMonthlyReport() {
    }

    public function graphCarnappedYearlyReport() {  
    }
    //end 



    //Numbers of civialian and register 
    public function civilians(Request $request) {

        $type = $request->input('type');
        $now = date('Y-m-d');
        $datenow = strtotime($now);

        switch ($type) {
          case '0':
              # daily
              $startDate = date("Y-m-d");
              $endDate = date("Y-m-d");
              $setTerm = date('F d, Y', strtotime($startDate)); //format
            break;
          case "1" :
              # weekly 
              $end = strtotime('last Sunday', $datenow);
              $nextEnd = strtotime('next  Sunday', $datenow);
              if (date('D', $datenow) == 'Mon') {
                $start = strtotime('last Monday', $datenow);
              } else {
                $start = strtotime('last Monday -7 days', $datenow);
              }

              $nextstart = strtotime('last Monday +7 days', $datenow);
              $format = 'Y-m-d';
              $startDate = date($format, $start);
              $nextstartDate = date($format, $nextstart);
              $endDate = date($format, $end);
              $nextendDate = date($format, $nextEnd);

              $tempStartDate = date('F', strtotime($startDate));
              $tempEndDate = date('F', strtotime($endDate));

              //next mon and mext sun end for 7 days
              $tempNextStartDate = date('F', strtotime($nextstartDate));
              $tempNextEndDate = date('F', strtotime($nextendDate));

              if ($tempStartDate != $tempEndDate){
                $setTerm = date('F d', strtotime($startDate)).' - '.date('F d, Y', strtotime($endDate));
              } else {
                $setTerm = date('F d', strtotime($startDate)).' - '.date('d, Y', strtotime($endDate));
              }

              if ($tempNextStartDate != $tempNextEndDate) {
                $nextTerm = date('F d, Y', strtotime($nextstartDate));
              } else {
                $nextTerm = date('F d, Y ', strtotime($nextstartDate));
              }

            break;
          case "2" :
              #momtly
              $startDate = date("Y-m-01", strtotime($now));
              $endDate = date("Y-m-t", strtotime($now));
              $lastSunday = date("Y-m-d", strtotime('last Sunday', strtotime($now)));

              if (date('m', strtotime($lastSunday)) != date('m', strtotime($startDate))) {
                // get previous month data for overlapping cases
                $startDate = date("Y-m-d", strtotime('first day of last month', $datenow));
                $endDate = date("Y-m-d", strtotime('last day of last month', $datenow));
              }
              $setTerm = date('F, Y', strtotime($startDate));

              break;
          default:
              $startDate = date("Y-m-d");
              $endDate = date("Y-m-d");
              $setTerm = date('F d, Y', strtotime($startDate)); //format
            break;

        }

        
          $allCivilians =  $this->database->getReference('civilians/')
                          ->orderByChild('created_datetime') 
                          ->getValue();

          $returnData = array(
            'currentTerm' => $setTerm,
            'nextTerm' => $nextTerm,
            'allTeachers' => $allCivilians,
            'totalCivilians' => count($allCivilians)
          );

          return $returnData;

    }



}
 