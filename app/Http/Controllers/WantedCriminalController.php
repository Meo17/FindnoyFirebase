<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;

class WantedCriminalController extends Controller
{

    public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }

    #action to close the file case criminal
    public function editCriminal(Request $request) {
      $id = isset($request['id']) ? $request['id'] : '';
      $userInfo  =  $this->session->getSessionLogin($request);

      $file_image_wanted_criminals = $request->file('file_image_wanted_criminals');  
      $fname_wanted_criminals = $request->input('fname_wanted_criminals');
      $m_wanted_criminals = $request->input('m_wanted_criminals');
      $lname_wanted_criminals = $request->input('lname_wanted_criminals');
      $case_number_wanted_criminals = $request->input('case_number_wanted_criminals');
      $case_file_wanted_criminals = $request->input('case_file_wanted_criminals');
      $select_tags_wanted_criminals = $request->input('select_tags_wanted_criminals');
      $date_filed_wanted_criminals = $request->input('date_filed_wanted_criminals');
      $nickname_wanted_criminals = $request->input('nickname_wanted_criminals');
      $bounty_wanted_criminals = $request->input('bounty_wanted_criminals');
      $police_officer_wanted_criminals = $request->input('police_officer_wanted_criminals');

     

      if (!empty($userInfo) ) {
          $ref  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request).'/'. $id);
            
            if(!empty(  $file_image_wanted_criminals))  {
              //upload profile  
                $firebase_storage_path = 'Wanted_Criminals/';
                $firebase_storage_path1 = 'Documents_Missing_Person/'; 
                $name     = substr(md5(mt_rand()), 0, 7); 
        
                $localfolder = public_path('firebase-temp-uploads') .'/';
                $extension = $file_image_wanted_criminals->getClientOriginalExtension();
                $file      = $name. '.' . $extension;  
        
              if ($file_image_wanted_criminals->move($localfolder, $file) ) {  
                  $uploadedfile = fopen($localfolder.$file, 'r'); 
                  $picUrl =  $this->session->uploadDoc($localfolder,$uploadedfile,$firebase_storage_path,$file);  
              } // end upload
            }


          $update = [
                    'fname_wanted_criminals' => $fname_wanted_criminals, 
                    'm_wanted_criminals' => $m_wanted_criminals, 
                    'lname_wanted_criminals' => $lname_wanted_criminals,
                    'case_number_wanted_criminals' => $case_number_wanted_criminals, 
                    'case_file_wanted_criminals' => $case_file_wanted_criminals,
                    'select_tags_wanted_criminals' => $select_tags_wanted_criminals,
                    'date_filed_wanted_criminals' => $date_filed_wanted_criminals, 
                    'nickname_wanted_criminals' => $nickname_wanted_criminals, 
                    'bounty_wanted_criminals' => $bounty_wanted_criminals,
                    'police_officer_wanted_criminals' => $police_officer_wanted_criminals,
                    'modify_datetime' => date('Y-m-d H:i:s'),
                    'status' => "active",
                    'uid' => $this->session->getSessionUId($request)
                ];


          if (!empty($picUrl)) {
              $update['file_image_wanted_criminals'] =  $picUrl ;
          }  
          toast('Successfully Updated!!','success');       

          $ref->update($update);
         return redirect('/list_wanted_criminal');
      } 
    }


    #force close the case if 7 years ago maximum 
    public function forceCloseFileCaseWantedCriminal(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);
       if (!empty($userInfo) ) {
         $ref  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request).'/'. $id);

           $update = [
            'status' => 'inactive',
            'modify_datetime' => date('Y-m-d H:i:s'),
           ];
          toast('Successfully Closed !!','success');       

          $ref->update($update);
         return redirect('/criminal');

       }

    }

   #call it in modal ajax sytyle
    public function viewCaseDetailsWantedCriminal(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $detailWantedCriminal  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request).'/'.$id)->getValue();
          return json_encode(array(
            'detail' =>   $detailWantedCriminal
          ));
        }  
    }
}

