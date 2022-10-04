<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{


	public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }

    public function save_user_profile (Request $req) {

    	$keyId 			    = $req->input('keyId');		
    	$police_user_rank   = $req->input('police_user_rank');
    	$police_user_fname  = $req->input('police_user_fname');
    	$police_user_mname  = $req->input('police_user_mname');
    	$police_user_lname  = $req->input('police_user_lname');
    	$police_user_bdate  = $req->input('police_user_bdate');
    	$station_name 	    = $req->input('station_name');
    	$id_region          = $req->input('region_user_profile'); 
    	$email_user_profile = $req->input('email_user_profile');
    	$police_pic_profile = $req->file('police_pic_profile');

		$ref = $this->database	
               ->getReference('police_station/'.$keyId);

    	if (!empty($police_pic_profile)) {
			//upload profile  
			$firebase_storage_path = 'Police_Admin_Pic/';
			$name     = substr(md5(mt_rand()), 0, 7); 

			$localfolder = public_path('firebase-temp-uploads_profile_pic') .'/';
			$extension = $police_pic_profile->getClientOriginalExtension();
			$file      = $name. '.' . $extension;  

			if ($police_pic_profile->move($localfolder, $file) ) {  
				$uploadedfile = fopen($localfolder.$file, 'r'); 
				$picUrl =  $this->session->uploadDoc($localfolder,$uploadedfile,$firebase_storage_path,$file);  
			} // end upload

    	}

    	$update = [
    		'police_user_rank' 	=> $police_user_rank,
    		'police_user_fname' => $police_user_fname,
    		'police_user_mname' => $police_user_mname,
    		'police_user_lname' => $police_user_lname,
    		'police_user_bdate' => $police_user_bdate,
    		'station_name' 		=> $station_name,
    		'id_region' 		=> $id_region,
            'rank'              => $police_user_rank,
            'modify_datetime'   => date('Y-m-d H:i:s'),
		
    	];
         
        //- check if not empty
        if (isset($picUrl) && !empty($picUrl)) {
            $update['police_pic_profile']  = $picUrl; 
        }

    	$ref->update($update);
		toast('Successfully Updated!!','success');
    
       return redirect('/users_profile');
    }

	// Police Station
	public function users_profile(Request $request){
        $uid = $this->session->getSessionUId($request);
        $userInfo  =  $this->session->getSessionLogin($request);
        $email      = isset($userInfo['email']) ? $userInfo['email']  : "" ;
        $pas = isset($userInfo['password']) ? $userInfo['password']  : "" ;

        if (!empty($email) && !empty($pas)) {   
            $users_profile  = $this->database
                        ->getReference('police_station')
                        ->orderByChild("uid")
                        ->equalTo($uid)
                        ->getValue();

        	return view('Profile/user_profiles',
                 [
                     'userInfo2' => $users_profile,
					 'userInfo' => $userInfo
                 ]
             );
      } else {
        return redirect('/');
      } 
    }


}