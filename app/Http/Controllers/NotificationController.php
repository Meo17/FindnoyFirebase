<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;

class NotificationController extends Controller 
{

	public function __construct(){
        $this->database = FirebaseService::connect();
        $this->auth = Firebase::auth();
        $this->session = new SystemConfigureController;   
    }

    // police station
    public function showall(Request $request){
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {
            return view('Notification/showall',
                ['userInfo' => $userInfo ]
            );
        } else {
            return redirect('/');
        }
    }

    // super admin 
    public function showall_super_admin(Request $request){
        $userInfo   =  $this->session->getSessionLoginSuperAdmin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas        = isset($userInfo['password']) ? $userInfo['password']  : "" ;
 

        $notif     =  $this->database->getReference('notification_request_for_deactivation/'.$Uid."/".$id_notification);

        if (!empty($email) && !empty($pas)) {
            return view('Notification/showall',
                 [  
                    'userInfo' => $userInfo,
                    'notification'=> $notif,
                 ]
            );
        } else {
            return redirect('/');
        }
    }

    // police station admin
    public function  extend_showall(Request $request){  
        $userInfo   =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        $notifications = array();

        if (!empty($email) && !empty($pas)) {
            return view('Notification/extend_showall',
                [
                     'userInfo' => $userInfo,
                     'notification' => $notifications,
                ]
            );
        } else {
            return redirect('/');
        }
    }

    public function  extend_showall_superadmin(Request $request){  
        $userInfo   =  $this->session->getSessionLoginSuperAdmin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas        = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        $Uid                     = isset($request['uid']) ? $request['uid']  : "" ;
        $id_notification         = isset($request['id_notification']) ? $request['id_notification']  : "" ;
        $ref     = $this->database->getReference('notification_request_for_deactivation/'.$Uid."/".$id_notification);



        if (!empty($email) && !empty($pas)) {

             if (!empty($id_notification)) {
                $stat  = array(
                    'status' => 'read',
                    'modified_datetime' => date('Y-m-d H:i:s'),
                );

                $ref->update($stat);
            }   
            return view('Notification/extend_showall',
                [
                    'userInfo' => $userInfo,
                     'display_notif' => $ref,
                 ]
            );
        } else {
            return redirect('/');
        }
    }

    // sending request to admistration
    public function requestDeactivationOfficer(Request $request) {
        $userInfo    = $this->session->getSessionLogin($request);
        $Uid         = isset($userInfo['uid']) ? $userInfo['uid']  : "" ; //station
        $stationName = isset($userInfo['stationName']) ? $userInfo['stationName'] : "";
        $email       = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas         = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        $officer     = !empty($request['name_officer']) ? $request['name_officer'] : "";
        $idOfficer   = !empty($request['id_officer']) ? $request['id_officer'] : "";
        $officer_uid = !empty($request['officer_uid']) ? $request['officer_uid'] : "";
        $reason      = !empty($request['reason']) ? $request['reason'] : "";

        $message  = array(
            'title'=> "Request deactivation",
            'officer' => $officer,
            'uid' => $Uid,
            'officer_uid'=> $officer_uid,
            'id_officer' => $idOfficer,
            'stationName' => $stationName,
            'reason' => $reason,
            'created_datetime' => date('Y-m-d H:i:s'),
        );

        $ref     = $this->database->getReference('notification_request_for_deactivation/'.$Uid);
        $statReq = $this->database->getReference('police_officers/'.$Uid.'/'.$idOfficer);

        if (!empty($email) && !empty($pas)) {

            $saveToNotif = [
                'from' => $stationName,
                'to'  => 'Administration',
                'Message' => json_encode($message),
                'send_date_time' => date('Y-m-d H:i:s'),
                'timestamp'=> date('H:i:s'),
                'status' => 'unread',
                'purpose' => 'request for account deactivation',
                'action' => 'request',
                'id_officer' => $idOfficer,
                ];

            $statReq->update(['request_deac' => 'request for account deactivation' ]);

            $ref->push($saveToNotif);
            toast('Successfully Send !','success');
        } 
    }   

    public function requestApprovedDeactivation(Request $request) {
      #send it police station notification
      $Uid                     = isset($request['uid']) ? $request['uid']  : "" ;
      $id_notification         = isset($request['id_notification']) ? $request['id_notification']  : "" ;
      $idOfficer               = !empty($request['id_officer']) ? $request['id_officer'] : "";
      $officer_uid             = !empty($request['officer_uid']) ? $request['officer_uid'] : "";

      $ref                     = $this->database->getReference('notification_request_for_deactivation/'.$Uid."/".$id_notification);
      $statReq = $this->database->getReference('police_officers/'.$Uid.'/'.$idOfficer);

      if (!empty($id_notification)) {

        try {
            $this->auth->disableUser($officer_uid);
            catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                return json_encode(array('response' => $e->getMessage()));
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            $ref->update(array('action' => 'approved'));
            $statReq->update(array(
                    'request_deac' => 'Approved  account deactivation by administration', 
                    'status' => 'inactive',
                    'modify_datetime' => date('Y-m-d H:i:s'),
                ));
            return json_encode(array('status' =>  'Disabled')) ;
        }
      } else  {
        return json_encode(array('status' =>  false)) ;
      } 
    }
}

