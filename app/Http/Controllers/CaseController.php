<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;

class CaseController extends Controller
{
    
    //
    public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }

    #wanted criminals
    public function wanted_criminals(Request $request) {
        $userInfo  =  $this->session->getSessionLogin($request);

  
        if (!empty($userInfo) && !empty($request) ) {
          $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))->getValue();
          return view('/Case/wanted_criminals',
              [
                  'userInfo' => $userInfo,
                  'field_officers' => $field_officers,
               ]
          );
        } else {
          return redirect('/');
        } 
    }
    
    #missing person view
    public function missing_person(Request $request){
        $userInfo  =  $this->session->getSessionLogin($request);
     
        if (!empty($userInfo) && !empty($request) ) {
        
          $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))->getValue();
          return view('/Case/missing_person',
                [
                    'userInfo' => $userInfo,
                    'field_officers' =>  $field_officers,
                ]
            );
        } else {
          return redirect('/');
        } 
    }

    #carnapped view
    public function carnapped(Request $request) {
        $userInfo  =  $this->session->getSessionLogin($request);

        if (!empty($userInfo) && !empty($request) ) {
           
          $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))->getValue();
          return view('/Case/carnapped',
              [
                  'userInfo' => $userInfo,
                  'field_officers' =>  $field_officers,
               ]
          );
        } else {
          return redirect('/');
        } 
    }

    #dashboardcase view 
    public function dashboardcase(Request $request){ 
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $list_missing_person  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request))
                                ->limitToLast(1)
                                ->orderByChild("status")
                                ->equalTo("active")
                                ->getValue();
          $list_wanted_criminals  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                                ->limitToLast(1)
                                ->orderByChild("status")
                                ->equalTo("active")
                                ->getValue();
          $list_carnapped_v  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request))
                                ->limitToLast(1)
                                ->orderByChild("status")
                                ->equalTo("active")
                                ->getValue();
       
          return view('/Case/dashboardcase',
              [
                  'userInfo' => $userInfo,
                  'list_missing_person' => $list_missing_person,
                  'list_wanted_criminals'=>$list_wanted_criminals,
                  'list_carnapped_v' => $list_carnapped_v,
               ]
          );
        } else {
            return redirect('/');
          } 
    }

    public function save_wanted_criminal(Request $request){
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


        if (
            !empty($file_image_wanted_criminals) && 
            !empty($fname_wanted_criminals) && 
            !empty($lname_wanted_criminals) && 
            !empty($case_number_wanted_criminals) && 
            !empty($case_file_wanted_criminals) &&
            !empty($select_tags_wanted_criminals) && 
            !empty($date_filed_wanted_criminals) 
            ){
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
              toast('Successfully Save!!','success');
            // save data all  from inputs 
            $this->database
                ->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                ->push([
                    'file_image_wanted_criminals' => $picUrl, 
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
                    'created_datetime' => date('Y-m-d H:i:s'),
                    'modify_datetime' => "",
                    'status' => "active",
                    'uid' => $this->session->getSessionUId($request)
                ]);
        
          return redirect('/list_wanted_criminal');
        } else {
            toast('Please fill all input fields !! ','error');
           return redirect('/wanted_criminals');
        }
    }
    // missing person
    public function save_missing_person(Request $request) {   
        $fname_missing_person = $request->input('fname_missing_person');  
        $m_missing_person = $request->input('m_missing_person');
        $lname_missing_person = $request->input('lname_missing_person'); 
        $nickanme_name_missing_person = $request->input('nickanme_name_missing_person'); 
        $address_missing_person = $request->input('address_missing_person'); 
        $location_missing_person = $request->input('location_missing_person');
        $date_missing_person = $request->input('date_missing_person'); 
        $gaurdian_missing_person = $request->input('gaurdian_missing_person');  
        $contact_missing_person = $request->input('contact_missing_person'); 
        $select_station_missing_person = $request->input('select_station_missing_person');
        $region_missing_person = $request->input('region_missing_person');
        $id_province = $request->input('select_province_missing_person');
        


        // Pronvice to name
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


        $id_city = $request->input('select_city_missing_person'); // change id_city to name
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


        $id_station_name = $request->input('select_station_name');
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

        $id_station_num = $request->input('select_station_number_missing_person');
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
        

        $select_zipcode_missing_person = $request->input('select_zipcode_missing_person');
        $police_officer_missing_person =  $request->input('police_officer_missing_person');
        $date_filed_missing_person =  $request->input('date_filed_missing_person');

        $doc1_missing_person =  $request->file('doc1_missing_person');
        $doc2_missing_person =  $request->file('doc2_missing_person');
        $doc3_missing_person =  $request->file('doc3_missing_person');
        $file_image_missing_person = $request->file('file_image_missing_person');

        if (
            !empty( $doc1_missing_person) ||
            !empty( $doc2_missing_person)  ||
            !empty( $doc3_missing_person) ||
            !empty($file_image_missing_person)
        ){
                //upload profile  
                $firebase_storage_path = 'Missing_Person/';
                $firebase_storage_path1 = 'Documents_Missing_Person/'; 
                $name     = substr(md5(mt_rand()), 0, 7); 
                $name1     = substr(md5(mt_rand()), 0, 8);  
                $name2     = substr(md5(mt_rand()), 0, 9);  
                $name3     = substr(md5(mt_rand()), 0, 10);  
        
                $localfolder = public_path('firebase-temp-uploads') .'/';
                $localfolder1 = public_path('firebase-temp-uploads1') .'/';
                $localfolder2 = public_path('firebase-temp-upload2') .'/';
                $localfolder3 = public_path('firebase-temp-uploads3') .'/';
                $extension = $file_image_missing_person->getClientOriginalExtension();
                $file      = $name. '.' . $extension;  
                if ($file_image_missing_person->move($localfolder, $file) ) {  
                    $uploadedfile = fopen($localfolder.$file, 'r'); 
                    $picUrl =  $this->session->uploadDoc($localfolder,$uploadedfile,$firebase_storage_path,$file);  
                } // end upload
            
                $docUrl1 ="";
                $docUrl2 ="";
                $docUrl3 ="";
                //doc 1 missing person  
                if(!empty( $doc1_missing_person)) {
                    $extension1 = $doc1_missing_person->getClientOriginalExtension(); 
                    $file1      = $name1. '.' . $extension1;     
                    if ($doc1_missing_person->move($localfolder1, $file1) ) {  
                        $uploadedfile1 = fopen($localfolder1.$file1, 'r'); 
                        $docUrl1 =  $this->session->uploadDoc($localfolder1,$uploadedfile1,$firebase_storage_path1,$file1);
                    }  
                }
                if(!empty( $doc2_missing_person)) {
                    $extension2 = $doc2_missing_person->getClientOriginalExtension(); 
                    $file2     = $name2. '.' . $extension2;   
                    if ($doc2_missing_person->move($localfolder2, $file2) ) {  
                        $uploadedfile2 = fopen($localfolder2.$file2, 'r'); 
                        $docUrl2 =  $this->session->uploadDoc($localfolder2,$uploadedfile2,$firebase_storage_path1,$file2);
                    }   
                }
                if(!empty($doc3_missing_person)) {
                    $extension3 = $doc3_missing_person->getClientOriginalExtension();
                    $file3     = $name3. '.' . $extension3;    
                    if ($doc3_missing_person->move($localfolder3, $file3) ) {  
                        $uploadedfile3 = fopen($localfolder3.$file3, 'r'); 
                        $docUrl3 =  $this->session->uploadDoc($localfolder3,$uploadedfile3,$firebase_storage_path1,$file3);
                    }   
                }
        }

        if (
            !empty($picUrl) && 
            !empty($fname_missing_person) && 
            !empty($m_missing_person) && 
            !empty($lname_missing_person) && 
            !empty($nickanme_name_missing_person) && 
            !empty($address_missing_person) && 
            !empty($location_missing_person) &&
            !empty($date_missing_person) && 
            !empty($gaurdian_missing_person) &&
            !empty($contact_missing_person) &&
            !empty($select_station_missing_person) &&
            !empty($police_officer_missing_person) &&
            !empty($date_filed_missing_person) &&
            !empty($docUrl1) ||
            !empty($docUrl2) ||
            !empty($docUrl3) ||
            !empty($region_missing_person) &&
            !empty($finalNameProv) &&
            !empty($finalNameCity) &&
            !empty($finalStationName) &&
            !empty($finalStationNumber)
        
            ){

            // save data all  from inputs 
            $this->database
            ->getReference('missing_persons/'.$this->session->getSessionUId($request))
            ->push([
                'file_image_missing_person_url' => $picUrl, 
                'fname_missing_person' => $fname_missing_person, 
                'm_missing_person' => $m_missing_person, 
                'lname_missing_person' => $lname_missing_person,
                'nickanme_name_missing_person' => $nickanme_name_missing_person, 
                'address_missing_person' => $address_missing_person,
                'location_missing_person' => $location_missing_person,
                'date_missing_person' => $date_missing_person,
                'gaurdian_missing_person'=> $gaurdian_missing_person,
                'contact_missing_person'=> $contact_missing_person,
                'select_station_missing_person' => $select_station_missing_person,
                'police_officer_missing_person'=> $police_officer_missing_person,
                'date_filed_missing_person' => $date_filed_missing_person,
                'doc1_missing_person_url' => $docUrl1,
                'doc2_missing_person_url' => $docUrl2,
                'doc3_missing_person_url' => $docUrl3,
                // 'select_zipcode_missing_person' => $select_zipcode_missing_person,
                'police_officer_missing_person' => $police_officer_missing_person,
                'region_missing_person' => $region_missing_person,
                'province_missing_person'=> $finalNameProv,
                'city_missing_person' => $finalNameCity,
                'station_name_missing_person' => $finalStationName,
                'station_num_missing_person' => $finalStationNumber,
                'created_datetime' => date('Y-m-d H:i:s'),
                'modify_datetime' => "",
                'status' => "active",
                'uid' => $this->session->getSessionUId($request)
                
            ]);

             toast('Successfully Save!!','success');
          return redirect('/list_missing_person');
        } else {
            toast('Please fill all input fields !! ','error');
            return redirect('/missing_person');
        }
    }
    //carnapped
    public function save_carnapped(Request $request){
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
      



            if (
                !empty($file_image_carnapped) && 
                !empty($file1_image_carnapped) ||
                !empty($file2_image_carnapped) ||  
                !empty($owner_name_carnapped) && 
                !empty($color_carnapped) && 
                !empty($case_number_carnapped) &&
                !empty($plate_number_carnapped) && 
                !empty($select_vehicle_carnapped &&
                !empty($date_lost_carnapped) && 
                !empty($date_reported_carnapped) && 
                !empty($attached_file1_carnapped) ||
                !empty($attached_file2_carnapped) ||
                !empty($attached_file3_carnapped) ||
                !empty($attached_file4_carnapped) ||
                !empty($attached_file5_carnapped) 
            
                ) 
                ){
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
                // save data all  from inputs 
                $this->database
                        ->getReference('carnapped/'.$this->session->getSessionUId($request))
                        ->push([
                        'file_image_carnapped' => $picUrl, 
                        'file1_image_carnapped' => $picUrl1, 
                        'file2_image_carnapped' => $picUrl2, 
                        'owner_name_carnapped' => $owner_name_carnapped,
                        'color_carnapped' => $color_carnapped, 
                        'case_number_carnapped' => $case_number_carnapped,
                        'plate_number_carnapped' => $plate_number_carnapped,
                        'select_vehicle_carnapped' => $select_vehicle_carnapped, 
                        'date_lost_carnapped' => $date_lost_carnapped,
                        'date_reported_carnapped' => $date_reported_carnapped,
                        'attached_file1_carnapped' => !empty($supUrl) ? $supUrl : null,
                        'attached_file2_carnapped' => !empty($supUrl1) ? $supUrl1 : null,
                        'attached_file3_carnapped' => !empty($supUrl2) ? $supUrl2 : null,
                        'attached_file4_carnapped' => !empty($supUrl3) ? $supUrl3 : null,
                        'attached_file5_carnapped' => !empty($supUrl4) ? $supUrl4 : null,
                        'other_carnapped' => $other_carnapped,
                        'police_officer_carnapped' => $police_officer_carnapped,
                        'created_datetime' => date('Y-m-d H:i:s'),
                        'modify_datetime' => "",
                        'status' => "active",
                        'uid' => $this->session->getSessionUId($request)
                    ]);

             toast('Successfully Save!!','success');
          return redirect('/list_carnapped');
        } else {
            toast('Please fill all input fields !! ','error');
           return redirect('/carnapped');
        }
    }

    #missing person list
    public function list_missing_person(Request $request){
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $list_missing_person  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request))
                                ->orderByChild("status")
                                ->equalTo("active")
                                ->getValue();

          $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))->getValue();

          return view('/MissingPerson/list_missing_person',
              [
                  'userInfo' => $userInfo,
                  'list_missing_person' => $list_missing_person,
                  'field_officers' => $field_officers,
               ]
          );
        } else {
          return redirect('/');
        } 
    }

    #wanted criminals list
    public function list_wanted_criminal(Request $request){
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $list_wanted_criminal  = $this->database->getReference('wanted_criminals/'.$this->session->getSessionUId($request))
                                ->orderByChild("status")
                                ->equalTo("active")
                                ->getValue();

         $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))->getValue();
          return view('/WantedCriminal/list_wanted_criminal',                    
              [
                  'userInfo' => $userInfo,
                  'list_wanted_criminal' => $list_wanted_criminal,
                  'field_officers' => $field_officers,
               ]
          );
        } else {
          return redirect('/');
        } 
    }

    #carnapped list 
    public function list_carnapped(Request $request){
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $list_carnapped  = $this->database->getReference('carnapped/'.$this->session->getSessionUId($request))
                            ->orderByChild("status")
                            ->equalTo("active")
                            ->getValue();
          $field_officers  = $this->database->getReference('police_officers/'.$this->session->getSessionUId($request))->getValue();
          return view('/Carnapped/list_carnapped',
              [
                  'userInfo' => $userInfo,
                  'list_carnapped' => $list_carnapped,
                  'field_officers' => $field_officers,
               ]
          );
        } else {
          return redirect('/');
        } 
    }

}


