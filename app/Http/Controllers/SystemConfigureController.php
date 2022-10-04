<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Services\FirebaseService;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use DateTime;


class SystemConfigureController extends Controller
{
    //
    public function __construct(){
        $this->database = FirebaseService::connect();
        $this->auth = Firebase::auth();
    }
    // getSessionLoginSuperAdmin
    public function  getSessionLoginSuperAdmin(Request $request){
        $pas = $request->session()->get('password');
        $email = $request->session()->get('email');
        $displayName = $request->session()->get('displayName');
        $role = $request->session()->get('role');
          
        if (!empty($email) && !empty($pas)) {
              $userInfo = array(
                'password'=> $pas,
                'displayName'=> $displayName,
                'email'=> $email,
                'role' => $role,
            );
            return $userInfo;
            
        } else {
            return false;
        }   
    }

    //logout
    public function logout(Request $request){
        session()->flush();
        return redirect('/');
    }

    //defualt functions
    public function  getSessionLogin($request){
        $pas = $request->session()->get('password');
        $email = $request->session()->get('email');
        $displayName = $request->session()->get('displayName');
        $role = $request->session()->get('role');
        $id_region= "";
        $police_user_rank= "";
        $police_user_lname= "";
        $station_num= "";
        $police_pic_profile= "";
        $stationName ="";

        $police_station  = $this->database->getReference('police_station')->getValue();
        $uid =  $request->session()->get('uid');
        $rank = "";
        foreach ($police_station as $key=> $val) {
            if($val['email'] ==  $email) {
                $rank = isset($val['rank']) ? $val['rank'] : "";
                $station_num = isset($val['station_num']) ? $val['station_num'] : "";  
                $station_name = isset($val['station_name']) ? $val['station_name'] : "";  
                $id_region = isset($val['id_region']) ? $val['id_region'] : "";   
                $police_user_lname = isset($val['police_user_lname']) ? $val['police_user_lname'] : "";   
                $police_user_rank = isset($val['police_user_rank']) ? $val['police_user_rank'] : "";  
                $police_pic_profile = isset($val['police_pic_profile']) ? $val['police_pic_profile'] : "";  
                $stationName = $station_num . " " .$val['station_name'];
            }
        }

        if (!$stationName ) {
            return "";  
        }
        if (!empty($email) && !empty($pas)) {   
            $userInfo = array(
                'password'=> $pas,
                'displayName'=> $displayName,
                'email'=> $email,
                'rank' => $rank,
                'id_region' => $id_region,
                'role' =>   $role,
                'uid' => $uid,
                'police_user_rank' => $police_user_rank,
                'police_user_lname'=> $police_user_lname,
                'station_num' => $station_num,
                'police_pic_profile'=> $police_pic_profile,
                'stationName' =>  $stationName

            );
            return $userInfo;
    

        } else {
            return false;
        }    
    }

    public function uploadDoc($localfolder,$uploadedfile,$firebase_storage_path,$file) {
        $storage = app('firebase.storage')->getBucket();
        $uploadedObject = $storage
        ->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
        unlink($localfolder . $file);         
        $CreateAt = new \DateTime('2027-01-01');
        $Url = $uploadedObject->signedUrl($CreateAt).PHP_EOL;
        return   $Url ;
    }

    private function mailData(){
        $mail = new PHPMailer(true);  
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.googlemail.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'findnoy2022@gmail.com';   //  sender username
        $mail->Password = 'kuaxrngqqtcdfwfh';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom('findnoy2022@gmail.com', 'FindNoy');
        $mail->isHTML(true);                // Set email content format to HTML

        return  $mail; 
    }

    //mail config
    public function mailConfig($id_email, $defaultPass){
        $mail = $this->mailData();
        $mail->addAddress($id_email);
        $mail->Subject = "FINDNOY : Account Registered";
        $mail->Body  = 
            "Email : " . $id_email .  "<br/>".
            "Password : ". $defaultPass;

        $mail->send();
    }

    #add with uid
    public function getSessionUId(Request $request) {
        $userInfo   =  $this->getSessionLogin($request);
        $uid        = isset($userInfo['uid']) ? $userInfo['uid']  : "" ;
        return $uid;
    }
    
    public function mailDisabledAccount($id_email, $nameStation){
        $mail = $this->mailData();
        $mail->addAddress($id_email);
        $mail->Subject = "FINDNOY : Account Disabled";
        $mail->Body  = "This ".$nameStation." is disabled by the administration, contact the handler or helpdesk@findnoy.com for more information or concern about this message";
        $mail->send();
    }

    public function mailActivateAccount($id_email, $nameStation){
        $mail = $this->mailData();
        $mail->addAddress($id_email);
        $mail->Subject = "FINDNOY : Account Activated";
        $mail->Body  = $nameStation." is Activated, you can now access your station and open your account";
        $mail->send();
    }

    public function mailDeactivatePoliceStationAccount($id_email, $fullname,$stationName){
        $mail = $this->mailData();
        $mail->addAddress($id_email);
        $mail->Subject = "FINDNOY : Account Deactivated ";
        $mail->Body  = "Good Day!".$fullname." your account is Deactivated."."<br/>".
                        "This account is part of ".$stationName. " due to contract concerns between FindNoy and the Station. If you have concerns about the account, please contact helpdesk@findnoy.com or your local police station for more information." ;
        $mail->send();
    }

    public function mailDeactivatePoliceOfficer($id_email, $fullname,$stationName){
        $mail = $this->mailData();
        $mail->addAddress($id_email);
        $mail->Subject = "FINDNOY : Account Deactivated ";
        $mail->Body  = "Good Day!".$fullname." your account is Deactivated."."<br/>".
                        "This account is deactivated by your police administrator if you have concerns or you want to access the account, please contact helpdesk@findnoy.com or your local police station.";
        $mail->send();
    }

    public function mailActivatePoliceOfficer($id_email, $fullname,$stationName){
        $mail = $this->mailData();            // Set email content format to HTML
        $mail->addAddress($id_email);
        $mail->Subject = "FINDNOY : Account Deactivated ";
        $mail->Body  = "Good Day!".$fullname." your account is Activated."."<br/>".
                        "This account is deactivated by your police administrator if you have concerns or you want to access the account, please contact helpdesk@findnoy.com or your local police station.";
        $mail->send();
    }
    
    #calcualte year diff in two dates 
    public function calculateYearDiff($start,$end,$keyId) {
        // $d1 = new DateTime('2011-03-12');
        // $d2 = new DateTime('2008-03-09');
        $d1 = new DateTime($start);
        $d2 = new DateTime($end);

        $diff = $d2->diff($d1);

        return array(
                'noYear' => $diff->y, 
                'keyId' => $keyId
            );
    }
} 
