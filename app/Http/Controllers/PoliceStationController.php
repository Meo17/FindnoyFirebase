<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class PoliceStationController extends Controller
{
    
    //
    public function __construct(){
        $this->database = FirebaseService::connect();
        $this->session = new SystemConfigureController;
    }
    
    public function homepage_police_station(Request $request) {
        $userInfo   =  $this->session->getSessionLogin($request);

        if (!$userInfo) {
            return redirect('/dashboard_police_officer');
        }
        
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        $count  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        
        $count1  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        $count2  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();

        $indexdate = array();
        $dates = array();
        $monthmissing_p = array();
        $carnapped_v = array();
        $wanted_per_arr = array();
        $data = array();
        #calculate monthly report
        $data_t  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        $data_t2  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        $data_t3  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();

        $data1 = array();
        $data2 = array();
        $data3 = array();

        #dates 12 months
        for ($i = 0; $i < 12; $i++) {
            $dates[] = date("F, Y", strtotime( date( 'Y-m-01' )." -$i months"));
            $indexdate[] =  date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"));
           
         }
        #missing_persons
         foreach ($data_t as $d => $val) {
            $monthmissing_p[] = date('F, Y',strtotime($val['created_datetime']));
            
        }

        $merge_missing_p =   array_count_values($monthmissing_p);
        foreach ( $dates as $key => $val ) {
            $data1[$val] =  "";
            foreach ( $merge_missing_p as $key2 => $val2 ) {
    
                if ( $key2 == $val ) {
                    $data1[$val] =  $val2;
                }
               
            }
        }
        #carnapped
        foreach ($data_t2 as $d2 => $val3) {
            $carnapped_v[] = date('F, Y',strtotime($val3['created_datetime']));
            
        }

        $carnapped_p =   array_count_values($carnapped_v);
        foreach ( $dates as $key3 => $val4 ) {
            $data2[$val4] =  "";
            foreach ( $carnapped_p as $key4 => $val5 ) {
                if ( $val4 == $key4 ) {
                    $data2[$val4] =  $val5;
                }
               
            }
        }
        
        #wanted 
         foreach ($data_t3 as $d3 => $w) {
            $wanted_per_arr[] = date('F, Y',strtotime($w['created_datetime']));
            
        }
        
        $wanted_p =   array_count_values($wanted_per_arr);
        foreach ( $dates as $key3 => $valw ) {
            $dat3[$valw] =  "";
            foreach ( $wanted_p as $key5 => $vl ) {
                if ( $valw == $key5 ) {
                    $data3[$valw] =  $vl;
                }
               
            }
        }
        
        if (!empty($email) && !empty($pas)) {
            return view('/DashboardPoliceStation/dashboard_police_station',
                [
                    'count_missing_persons' => count($count),
                    'count_wanted_criminals' => count($count1),
                    'count_carnapped' => count($count2),
                    'userInfo' => $userInfo,
                    'dates'    => $dates,
                    'indexdate'    => json_encode(array_values($dates)),
                    'miss_p_ar' => json_encode(array_values($data1)),
                    'carnapped_v_ar' => json_encode(array_values($data2)),
                    'wanted_p_ar' => json_encode(array_values($data3)),

                ]
            );
        } else {
            return redirect('/');
        }
    }

    public function add_field_officers(Request $request)  {
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas        = isset($userInfo['password']) ? $userInfo['password']  : "" ;
        
        if (!empty($email) && !empty($pas)) {
            return view('/DashboardPoliceStation/add_field_officers',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }

    public function save_add_field_officers(Request $request) {
        $defaultAuth = Firebase::auth(); 
        $rank_add_field_officers = $request->input('rank_add_field_officers');  
        $fname_add_field_officers = $request->input('fname_add_field_officers');
        $m_add_field_officers = $request->input('m_add_field_officers');
        $lname_add_field_officers = $request->input('lname_add_field_officers');
        $date_hired_add_field_officers = $request->input('date_hired_add_field_officers');
        $email_add_field_officers = $request->input('email_add_field_officers');
        $file_image_add_field_officers = $request->file('file_image_add_field_officers');

        if (
            !empty( $rank_add_field_officers) && 
            !empty( $fname_add_field_officers) &&
            !empty( $m_add_field_officers) && 
            !empty($date_hired_add_field_officers) &&
            !empty($email_add_field_officers) &&
            !empty($file_image_add_field_officers)
        ){
            $defaultPass = substr(md5(mt_rand()), 0, 8);            
            $addUser = [
                'email' =>  $email_add_field_officers,
                'password' =>  $defaultPass,
            ];

            $createdUser =  $defaultAuth->createUser($addUser);         
            $this->session->mailConfig($email_add_field_officers, $defaultPass);
            //upload profile  
            $firebase_storage_path = 'ProfileOfficer/';
            $name     = substr(md5(mt_rand()), 0, 7); 
            $localfolder = public_path('firebase-temp-pics') .'/';
            $extension = $file_image_add_field_officers->getClientOriginalExtension();
            $file      = $name. '.' . $extension;  
            $picUrl ="";

            if ($file_image_add_field_officers->move($localfolder, $file) ) {  
                $uploadedfile = fopen($localfolder.$file, 'r'); 
                $picUrl =  $this->session->uploadDoc($localfolder,$uploadedfile,$firebase_storage_path,$file);  
            } // end upload

            if (!empty($createdUser->uid)) {
                //save data all  from inputs 
                $this->database
                ->getReference('police_officers/'.$this->session->getSessionUId($request))
                ->push([
                    'uid' => $createdUser->uid,
                    'rank_add_field_officers' => strtoupper($rank_add_field_officers),
                    'fname_add_field_officers'=> strtoupper($fname_add_field_officers),
                    'm_add_field_officers' => strtoupper($m_add_field_officers),
                    'lname_add_field_officers' => strtoupper($lname_add_field_officers),
                    'date_hired_add_field_officers' => $date_hired_add_field_officers,
                    'email_add_field_officers'=> $email_add_field_officers,
                    'file_image_add_field_officers' => !empty($picUrl) ? $picUrl : null ,
                    'password' => $defaultPass,
                    'created_datetime' => date('Y-m-d H:i:s'),
                    'modify_datetime' => "",
                    'status' => "active",
                ]);

                toast('Successfully Save!!','success');
                return redirect('/list_field_officers');
            } else {
                toast('The email address is already in use by another account.','error');
                return redirect('/add_field_officers');      
            }
        } else {
           toast('Please fill all input fields !! ','error');
           return redirect('/add_field_officers');
       }   
    }

    //active accountof police station
    public function list_field_officers(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))
                            ->orderByChild("status")
                            ->equalTo("active")
                            ->getValue();

            return view('/DashboardPoliceStation/list_field_officers',
                [
                    'userInfo' => $userInfo ,
                    'field_officers' => $field_officers,
                ]
            );
        } else {
            return redirect('/');
        }
    }

    //inactive account of police station
    public function list_inactive_field_officers(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))
                            ->orderByChild("status")
                            ->equalTo("inactive")
                            ->getValue();

            return view('/DashboardPoliceStation/list_inactive_field_officer',
                [
                    'userInfo' => $userInfo ,
                    'field_officers' => $field_officers,
                ]
            );
        } else {
            return redirect('/');
        }
    }
    
    public function list_of_civilians(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            return view('/DashboardPoliceStation/list_of_civilians',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }

    public function wanted_criminals(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            return view('/DashboardPoliceStation/wanted_criminals',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }

    public function missing_person(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            return view('/DashboardPoliceStation/missing_person',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }

    public function carnapped(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            return view('/DashboardPoliceStation/carnapped',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }

    public function ajax_today_missing_p(Request $request){
        $month = $request['monthly'];
        $yearly = $request['yearly'];
        $data_t  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        $count = 0;

        if(isset($month ) && !empty($month )) {
            foreach ($data_t as $d => $val) {
                $date = date('Y-m',strtotime($val['created_datetime']));
                if ($date == $month  ) {
                   $count ++ ;
                }
            }
        }
        else if(isset($yearly ) && !empty($yearly)) {
            foreach ($data_t as $d => $val2) {
                $date2 = date('Y',strtotime($val2['created_datetime']));
              
                if ($date2 == $yearly  ) {
                   $count ++ ;
                }
           }
        }
        return  $count;
    }

    public function ajax_today_missing_v(Request $request){
        $month = $request['monthly'];
        $yearly = $request['yearly'];
        $data_t  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        $count = 0;
        
        if(isset($month ) && !empty($month )) {
            foreach ($data_t as $d => $val) {
                $date = date('Y-m',strtotime($val['created_datetime']));
                if ($date == $month  ) {
                   $count ++ ;
                }
           }
        }
        else if(isset($yearly ) && !empty($yearly)) {
            foreach ($data_t as $d => $val2) {
                $date2 = date('Y',strtotime($val2['created_datetime']));
              
                if ($date2 == $yearly  ) {
                   $count ++ ;
                }
           }
        }
        return  $count;
    }

    public function ajax_today_missing_w(Request $request){
        $month = $request['monthly'];
        $yearly = $request['yearly'];
        $data_t  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                ->orderByChild('status')
                ->equalTo("active")
                ->getValue();
        $count = 0;
        
        if(isset($month ) && !empty($month )) {
            foreach ($data_t as $d => $val) {
                $date = date('Y-m',strtotime($val['created_datetime']));
                if ($date == $month  ) {
                   $count ++ ;
                }
           }
        }
        else if(isset($yearly ) && !empty($yearly)) {
            foreach ($data_t as $d => $val2) {
                $date2 = date('Y',strtotime($val2['created_datetime']));
              
                if ($date2 == $yearly  ) {
                   $count ++ ;
                }
           }
        }
        return  $count;
    }

    #to deactivate officers
    public function police_officer_deactivate(Request $request) {
        $userInfo   =  $this->session->getSessionLogin($request);
        $stationName = isset($userInfo['stationName']) ? $userInfo['stationName'] : "";
        $auth = Firebase::auth();
        $id = $request->input('id');
        $ref = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request)."/".$id);
        $get_uid  = $ref->getValue();

        $fullname = $get_uid['rank_add_field_officers'] . " " .$get_uid['lname_add_field_officers'] . ", " .$get_uid['fname_add_field_officers']. $get_uid['m_add_field_officers'];

        $fullname = $get_uid['rank_add_field_officers'] . " " .$get_uid['lname_add_field_officers'] . ", " .$get_uid['fname_add_field_officers']. $get_uid['m_add_field_officers'];
        if (!empty($get_uid)) {
  
              $user = $auth->disableUser($get_uid['uid']);
              if ($user == true)  {
                $this->database
                  ->getReference('police_officers/'.$this->session->getSessionUId($request)."/".$id)
                  ->update([
                      'status' => "inactive" ,
                      'modify_datetime' => date('Y-m-d H:i:s'),
                  ]);

              
              $this->session->mailDeactivatePoliceOfficer($get_uid['email_add_field_officers'], $fullname,$stationName);
              toast('Successfully Deactivated !! ','success');
              return redirect('/list_inactive_field_officers');
            }   
            
        }  
    }

    #to activate officers
    public function police_officer_activated(Request $request) {
        $userInfo   =  $this->session->getSessionLogin($request);
        $stationName = isset($userInfo['stationName']) ? $userInfo['stationName'] : "";
        $auth = Firebase::auth();
        $id = $request->input('id');
        $ref = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request)."/".$id);
        $get_uid  = $ref->getValue();

        $fullname = $get_uid['rank_add_field_officers'] . " " .$get_uid['lname_add_field_officers'] . ", " .$get_uid['fname_add_field_officers']. $get_uid['m_add_field_officers'];

        if (!empty($get_uid)) {
              $user = $auth->enableUser($get_uid['uid']);
              if ($user == true)  {
                $this->database
                  ->getReference('police_officers/'.$this->session->getSessionUId($request)."/".$id)
                  ->update([
                      'status' => "active" ,
                      'modify_datetime' => date('Y-m-d H:i:s'),
                  ]);
              $this->session->mailActivatePoliceOfficer($get_uid['email_add_field_officers'], $fullname,$stationName);
              toast('Successfully Activated !! ','success');
              return redirect('/list_field_officers');
            }   
            
        }  
    }

  }


