<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;

class CarnappedController extends Controller
{

    public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }

    public function updateCarnapped(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);

        $file_image_carnapped = $request->file('file_image_carnapped');  
        $file1_image_carnapped = $request->file('file1_image_carnapped');  
        $file2_image_carnapped = $request->file('file2_image_carnapped');  
        $owner_name_carnapped = $request->input('owner_name_carnapped');
        $color_carnapped = $request->input('color_carnapped');
        $case_number_carnapped = $request->input('case_number_carnapped');
        $plate_number_carnapped = $request->input('plate_number_carnapped');
        $select_vehicle_carnapped = $request->input('select_vehicle_carnapped');
        $date_lost_carnapped = $request->input('date_lost_carnapped');
        $date_reported_carnapped = $request->input('date_reported_carnapped');
        $other_carnapped = $request->input('other_carnapped');
        $attached_file1_carnapped = $request->file('attached_file1_carnapped');
        $attached_file2_carnapped = $request->file('attached_file2_carnapped');
        $attached_file3_carnapped = $request->file('attached_file3_carnapped');
        $attached_file4_carnapped = $request->file('attached_file4_carnapped');
        $attached_file5_carnapped = $request->file('attached_file5_carnapped');
        $police_officer_carnapped = $request->input('police_officer_carnapped');

        $ref  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request).'/'. $id);

        if (!empty($userInfo) ) {

                    //upload IMAGES
                    $firebase_storage_path = 'CarnappedVehicles/';
                    $firebase_storage_path1 = 'Documents_CarnappedVehicles/'; 

                    $name     = substr(md5(mt_rand()), 0, 7); 
                    $name1     = substr(md5(mt_rand()), 0, 7); 
                    $name2    = substr(md5(mt_rand()), 0, 7); 


                    $supdoc   = substr(md5(mt_rand()), 0, 7); 
                    $supdoc1     = substr(md5(mt_rand()), 0, 7); 
                    $supdoc2    = substr(md5(mt_rand()), 0, 7); 
                    $supdoc3     = substr(md5(mt_rand()), 0, 7); 
                    $supdoc4    = substr(md5(mt_rand()), 0, 7);

                    $picUrl= "";
                    $picUrl1= "";
                    $picUrl2 = "";

                    $supUrl = "";
                    $supUrl1 = "";
                    $supUrl2 = "";
                    $supUrl3 = "";
                    $supUrl4 = "";

                        if (!empty($file_image_carnapped) ) {
                            //1
                            $localfolder = public_path('firebase-temp-uploads') .'/';
                            $extension = $file_image_carnapped->getClientOriginalExtension();
                            $file      = $name. '.' . $extension;  
                            if ($file_image_carnapped->move($localfolder, $file) ) {  
                                $uploadedfile = fopen($localfolder.$file, 'r'); 
                                $picUrl =  $this->session->uploadDoc($localfolder,$uploadedfile,$firebase_storage_path,$file);  
                            } // end upload

                        }
                        
                        if (!empty($file1_image_carnapped) ) {
                            //2
                            $localfolder1 = public_path('firebase-temp-uploads1') .'/';
                            $extension1 = $file1_image_carnapped->getClientOriginalExtension();
                            $file1      = $name1. '.' . $extension1;  
                            if ($file1_image_carnapped->move($localfolder1, $file1) ) {  
                                $uploadedfile1 = fopen($localfolder1.$file1, 'r'); 
                                $picUrl1 =  $this->session->uploadDoc($localfolder1,$uploadedfile1,$firebase_storage_path,$file1);  
                            } // end upload
                        
                        }
                        if (!empty($file2_image_carnapped) ) {
                            //3
                            $localfolder2 = public_path('firebase-temp-uploads2') .'/';
                            $extension2 = $file2_image_carnapped->getClientOriginalExtension();
                            $file2      = $name2. '.' . $extension2;  
                            if ($file2_image_carnapped->move($localfolder2, $file2) ) {  
                                $uploadedfile2 = fopen($localfolder2.$file2, 'r'); 
                                $picUrl2 =  $this->session->uploadDoc($localfolder2,$uploadedfile2,$firebase_storage_path,$file2);  
                            } // end upload
                        }


                        if (!empty($attached_file1_carnapped) ) {
                            //1
                            $localfolder3 = public_path('firebase-temp-uploads3') .'/';
                            $extsup = $attached_file1_carnapped->getClientOriginalExtension();
                            $supdocfile      = $supdoc. '.' . $extsup;  
                            if ($attached_file1_carnapped->move($localfolder3, $supdocfile) ) {  
                                $uploadedfilesup = fopen($localfolder3.$supdocfile, 'r'); 
                                $supUrl =  $this->session->uploadDoc($localfolder3,$uploadedfilesup,$firebase_storage_path1,$supdocfile);  
                            } // end upload
                        }
       
                        if (!empty($attached_file2_carnapped) ) {
                            $localfolder4 = public_path('firebase-temp-uploads4') .'/';
                            $extsup1 = $attached_file2_carnapped->getClientOriginalExtension();
                            $supdocfile1      = $supdoc1. '.' . $extsup1;  
                            if ($attached_file2_carnapped->move($localfolder4, $supdocfile1) ) {  
                                $uploadedfilesup1 = fopen($localfolder4.$supdocfile1, 'r'); 
                                $supUrl1 =  $this->session->uploadDoc($localfolder4,$uploadedfilesup1,$firebase_storage_path1,$supdocfile1);  
                            }
                        } 
                        if (!empty($attached_file3_carnapped) ) {
                            $localfolder5 = public_path('firebase-temp-uploads5') .'/';
                            $extsup2 = $attached_file3_carnapped->getClientOriginalExtension();
                            $supdocfile2      = $supdoc2. '.' . $extsup2;  
                            if ($attached_file3_carnapped->move($localfolder5, $supdocfile2) ) {  
                                $uploadedfilesup2 = fopen($localfolder5.$supdocfile2, 'r'); 
                                $supUrl2 =  $this->session->uploadDoc($localfolder5,$uploadedfilesup2,$firebase_storage_path1,$supdocfile2);  
                            } 
                        }
                        if (!empty($attached_file4_carnapped) ) {
                            $localfolder6 = public_path('firebase-temp-uploads6') .'/';
                            $extsup3 = $attached_file4_carnapped->getClientOriginalExtension();
                            $supdocfile3      = $supdoc3. '.' . $extsup3;  
                            if ($attached_file4_carnapped->move($localfolder6, $supdocfile3) ) {  
                                $uploadedfilesup3 = fopen($localfolder6.$supdocfile3, 'r'); 
                                $supUrl3 =  $this->session->uploadDoc($localfolder6,$uploadedfilesup3,$firebase_storage_path1,$supdocfile3);  
                            } 
                        }
                        if (!empty($attached_file5_carnapped) ) {
                            $localfolder7 = public_path('firebase-temp-uploads7') .'/';
                            $extsup4 = $attached_file5_carnapped->getClientOriginalExtension();
                            $supdocfile4      = $supdoc4. '.' . $extsup4;  
                            if ($attached_file5_carnapped->move($localfolder7, $supdocfile4) ) {  
                                $uploadedfilesup4 = fopen($localfolder7.$supdocfile4, 'r'); 
                                $supUrl4 =  $this->session->uploadDoc($localfolder7,$uploadedfilesup4,$firebase_storage_path1,$supdocfile4);  
                            } 
                        }

                    $update = [

                            'owner_name_carnapped' => $owner_name_carnapped,
                            'color_carnapped' => $color_carnapped, 
                            'case_number_carnapped' => $case_number_carnapped,
                            'plate_number_carnapped' => $plate_number_carnapped,
                            'select_vehicle_carnapped' => $select_vehicle_carnapped, 
                            'date_lost_carnapped' => $date_lost_carnapped,
                            'date_reported_carnapped' => $date_reported_carnapped,
                            'other_carnapped' => $other_carnapped,
                            'police_officer_carnapped' => $police_officer_carnapped,
                            'modify_datetime' => date('Y-m-d H:i:s'),
                            'status' => "active",
                            'uid' => $this->session->getSessionUId($request)

                            ];

                          if (!empty($picUrl)) {
                              $update['file_image_carnapped'] =  $picUrl ;
                          }  

                          if (!empty($picUrl1)) {
                              $update['file1_image_carnapped'] =  $picUrl1 ;
                          } 


                          if (!empty($picUrl2)) {
                              $update['file2_image_carnapped'] =  $picUrl2 ;
                          }  

                          if (!empty($supUrl)) {
                              $update['attached_file1_carnapped'] =  $supUrl ;
                          }

                          if (!empty($supUrl1)) {
                              $update['attached_file2_carnapped'] =  $supUrl1 ;
                          }  

                          if (!empty($supUrl2)) {
                              $update['attached_file3_carnapped'] =  $supUrl2 ;
                          }    

                          if (!empty($supUrl3)) {
                              $update['attached_file4_carnapped'] =  $supUrl3 ;
                          }  

                          if (!empty($supUrl4)) {
                              $update['attached_file5_carnapped'] =  $supUrl4 ;
                          }  

                $ref->update($update);
                toast('Successfully updated !!','success');
               return redirect('/list_carnapped');
        }
    }

    public function forceCloseFileCaseCarnapped(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);
      
       if (!empty($userInfo) ) {
          $ref  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request).'/'. $id);

           $update = [
            'status' => 'inactive',
            'modify_datetime' => date('Y-m-d H:i:s'),
           ];
          toast('Successfully Closed !!','success');       

          $ref->update($update);
         return redirect('/vehicle');

       }
    }
    
    #get detail carnnapped 
    public function viewCaseDetailsCarnapped(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $detailCarnapped  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request).'/'.$id)->getValue();
          return json_encode(array(
            'detail' =>   $detailCarnapped
          ));
        }
    }


}