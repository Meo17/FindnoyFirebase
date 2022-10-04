<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;
use RealRashid\SweetAlert\Facades\Alert;

class MissingPersonController extends Controller
{

  public function __construct(){
        $this->database = FirebaseService::connect();  
        $this->session = new SystemConfigureController;   
    }

    public function updateMissingPerson(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);
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

        if (!empty($userInfo)) {
            $ref  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request).'/'. $id);
              if (
                  !empty( $doc1_missing_person) ||
                  !empty( $doc2_missing_person)  ||
                  !empty( $doc3_missing_person) ||
                  !empty($file_image_missing_person)
              )  {
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
                      if (!empty( $doc1_missing_person)) {
                          $extension1 = $doc1_missing_person->getClientOriginalExtension(); 
                          $file1      = $name1. '.' . $extension1;     
                          if ($doc1_missing_person->move($localfolder1, $file1) ) {  
                              $uploadedfile1 = fopen($localfolder1.$file1, 'r'); 
                              $docUrl1 =  $this->session->uploadDoc($localfolder1,$uploadedfile1,$firebase_storage_path1,$file1);
                          }  
                      }

                      if (!empty( $doc2_missing_person)) {
                          $extension2 = $doc2_missing_person->getClientOriginalExtension(); 
                          $file2     = $name2. '.' . $extension2;   
                          if ($doc2_missing_person->move($localfolder2, $file2) ) {  
                              $uploadedfile2 = fopen($localfolder2.$file2, 'r'); 
                              $docUrl2 =  $this->session->uploadDoc($localfolder2,$uploadedfile2,$firebase_storage_path1,$file2);
                          }   
                      }

                      if (!empty($doc3_missing_person)) {
                          $extension3 = $doc3_missing_person->getClientOriginalExtension();
                          $file3     = $name3. '.' . $extension3;    
                          if ($doc3_missing_person->move($localfolder3, $file3) ) {  
                              $uploadedfile3 = fopen($localfolder3.$file3, 'r'); 
                              $docUrl3 =  $this->session->uploadDoc($localfolder3,$uploadedfile3,$firebase_storage_path1,$file3);
                          }   
                      }
                  }

                  $update = [

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
                      // 'select_zipcode_missing_person' => $select_zipcode_missing_person,
                      'police_officer_missing_person' => $police_officer_missing_person,
                      'region_missing_person' => $region_missing_person,
                      'province_missing_person'=> $finalNameProv,
                      'city_missing_person' => $finalNameCity,
                      'station_name_missing_person' => $finalStationName,
                      'station_num_missing_person' => $finalStationNumber,
                      'modify_datetime' => date('Y-m-d H:i:s'),
                      'status' => "active",
                      'uid' => $this->session->getSessionUId($request)
                  ];

                  if (!empty($picUrl)) {
                    $update['file_image_missing_person_url'] =  $picUrl ;
                  }

                  if (!empty($docUrl1)) {
                      $update['doc1_missing_person_url'] =  $docUrl1 ;
                  }

                  if (!empty($docUrl2)) {
                      $update['doc2_missing_person_url'] =  $docUrl2 ;
                  }

                  if (!empty($docUrl3)) {
                      $update['doc3_missing_person_url'] =  $docUrl3 ;
                  }

                  $ref->update($update);
                  toast('Successfully updated !!','success');
                  return redirect('/list_missing_person');

            }
        }
  

    public function forceCloseFileCaseMissingPerson(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);

       if (!empty($userInfo) ) {
          $ref  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request).'/'. $id);

           $update = [
            'status' => 'inactive',
            'modify_datetime' => date('Y-m-d H:i:s'),
           ];
          toast('Successfully Closed !!','success');       

          $ref->update($update);
         return redirect('/missing');

       }
    }
    #get datail missing person
    public function  viewCaseDetailsMissingPerson(Request $request) {
        $id = isset($request['id']) ? $request['id'] : '';
        $userInfo  =  $this->session->getSessionLogin($request);
        if (!empty($userInfo) ) {
          $detailMissingPerson  = $this->database->getReference('missing_persons/'.$this->session->getSessionUId($request).'/'.$id)->getValue();
          return json_encode(array(
            'detail' =>   $detailMissingPerson
          ));
        }  
    }
    
}