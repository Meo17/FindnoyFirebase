<?php

namespace App\Http\Controllers;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SystemConfigureController;

class LoginController extends Controller
{
    //
    protected $auth;
    public function __construct(){
         $this->database = FirebaseService::connect();
         $this->auth = Firebase::auth();
         $this->session = new SystemConfigureController;
    }


    public function index() {
        return view('/Index/index');
    }

    #force to close from admin side login 

    public function forceCloseFileCases2(){
        $current_date = date('Y-m-d H:i:s');
        $this->forceCloseCaseMP($current_date,NULL);
        $this->forceCloseCaseCarnapped($current_date,NULL);
        $this->forceCloseCaseWantedP($current_date,NULL);
    }

    #force to close file if 7 years 
    public function forceCloseFileCases($userId){
      $current_date =   date('Y-m-d H:i:s');
      $this->forceCloseCaseMP($current_date,$userId);
      $this->forceCloseCaseCarnapped($current_date,$userId);
      $this->forceCloseCaseWantedP($current_date,$userId);
    }

    public function forceCloseCaseMP($current_date,$userId = null){
        $params = [
        'status'=> 'inactive',
        'modify_datetime' => $current_date
        ];

       if (!empty($userId)) {
          #cases missing person
          $missing_persons  = $this->database->getReference('missing_persons/'.$userId)
                        ->orderByChild('status')
                        ->equalTo("active")
                        ->getValue();

            foreach ($missing_persons as $key => $val) {
               $noYear = $this->session->calculateYearDiff($val['created_datetime'],$current_date,$key);
               #check if year total in 7 years 
               if ($noYear['noYear'] == 7 && $noYear['keyId'] == $key) {
                    $ref = $this->database->getReference('missing_persons/'.$userId.'/'.$noYear['keyId']);   
                    $ref->update($params);  
               } 
            }
       } else {
         $mp  = $this->database->getReference('missing_persons/')
                    ->getValue();
         foreach ($mp as $key => $val) {
            foreach ($val as $k => $v) {

                if ($v['status'] == 'active') {
                    $noYear = $this->session->calculateYearDiff($v['created_datetime'],$current_date,$k);
                    #check if year total in 7 years 
                    if ($noYear['noYear'] == 7 && $noYear['keyId'] == $k) {
                        $misp = $this->database->getReference('missing_persons/'.$key.'/'.$noYear['keyId']);  
                        $misp->update($params);  
                    }  
                }
            }
         }          
       }          
    }

    public function forceCloseCaseCarnapped($current_date,$userId = null){
        $params = [
            'status'=> 'inactive',
            'modify_datetime' => $current_date
        ];
        if (!empty($userId)) {

            #cases carnapped
            $carnapped  = $this->database->getReference('carnapped/'.$userId)
                        ->orderByChild('status')
                        ->equalTo("active")
                        ->getValue();

            #check if year total in 7 years 
            foreach ($carnapped as $key => $val) {
               $noYear = $this->session->calculateYearDiff($val['created_datetime'],$current_date,$key);
               if ($noYear['noYear'] == 7 && $noYear['keyId'] == $key) {
                    $ref = $this->database->getReference('carnapped/'.$userId.'/'.$noYear['keyId']);   
                    $ref->update($params);  
               }
                
            }
        } else {
             $car  = $this->database->getReference('carnapped/')
                        ->getValue();

             foreach ($car as $key => $val) {
                foreach ($val as $k => $v) {

                    if ($v['status'] == 'active') {
                        $noYear = $this->session->calculateYearDiff($v['created_datetime'],$current_date,$k);
                        #check if year total in 7 years 
                        if ($noYear['noYear'] == 7 && $noYear['keyId'] == $k) {
                            $carp = $this->database->getReference('carnapped/'.$key.'/'.$noYear['keyId']);  
                            $carp->update($params);  
                        }  
                    }
                }
             } 

        }    
    }

    public function forceCloseCaseWantedP($current_date,$userId = null){
       
      $params = [
        'status'=> 'inactive',
        'modify_datetime' => $current_date
      ];      
      if (!empty($userId)) {

          #cases wanted criminal
          $criminal  = $this->database->getReference('wanted_criminals/'.$userId)
                        ->orderByChild('status')
                        ->equalTo("active")
                        ->getValue();
            $params = [
                'status'=> 'inactive',
                'modify_datetime' => $current_date
            ];

            #check if year total in 7 years 
            foreach ($criminal as $key => $val) {
               $noYear = $this->session->calculateYearDiff($val['created_datetime'],$current_date,$key);
               if ($noYear['noYear'] == 7 && $noYear['keyId'] == $key) {
                    $ref = $this->database->getReference('wanted_criminals/'.$userId.'/'.$noYear['keyId']);   
                    $ref->update($params);  
               }
            } 
        } else {
             $wp  = $this->database->getReference('wanted_criminals/')
                        ->getValue();

             foreach ($wp as $key => $val) {
                foreach ($val as $k => $v) {

                    if ($v['status'] == 'active') {
                        $noYear = $this->session->calculateYearDiff($v['created_datetime'],$current_date,$k);
                        #check if year total in 7 years 
                        if ($noYear['noYear'] == 7 && $noYear['keyId'] == $k) {
                            $wantedp = $this->database->getReference('wanted_criminals/'.$key.'/'.$noYear['keyId']);  
                            $wantedp->update($params);  
                        }  
                    }
                }
             } 

        }      
    }

    public function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        if (!empty($email) && !empty($password)) {
            if ($email == "admin@findnoy.com" && $password == 'admin123') {
                $this->forceCloseFileCases2();

                $params = array(
                    'email'=> 'admin@findnoy.com',
                    'password'=>'admin123',
                    'displayName'=>'Super Admin',
                    'role' => "super_admin",
                    );
                session($params);
                return redirect('/home_superadmin');

            }  else {

                        try {

                                $user = $this->auth->getUserByEmail($email);
                                if ($user->disabled == false) {
                                    try {

                                        $signInResult =   $this->auth->signInWithEmailAndPassword($email,$password);
                                        $idTokenString = $signInResult->idToken();

                                        try {
                                            $verifiedIdToken  =  $this->auth->verifyIdToken($idTokenString);
                                            $uid = $verifiedIdToken->claims()->get('sub');
                                            $this->forceCloseFileCases($uid);

                                            $params = array(
                                                'uid' => $uid,
                                                'email'=>  $email,
                                                'password'=> $password,
                                                'displayName'=>'Police Station Admin',
                                                'role' => "police_station_admin",
                                            );
                                            session($params);
                                            return redirect('/dashboard_police_station');  

                                        } catch (InvalidToken $e) {
                                             $error_mess = "The token is Invalid" .$e->getMessage();
                                             return view('/Index/index',['mess' => $error_mess ]); 
                                             
                                        } catch (\InvalidArgumentException $e) {
                                            $error_mess = "The token could  not be parsed :" .$e->getMessage();
                                            return view('/Index/index',['mess' => $error_mess ]); 
                                        } 
                                                    
                                    } catch (Exception $e) {
                                        $error_mess = "Username or Password Incorrect";
                                         return view('/Index/index',['mess' => $error_mess ]); 
                                    }
                                } else {
                                    $error_mess = "This Account is disabled";
                                    return view('/Index/index',['mess' => $error_mess ]); 
                                }
                        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                                $error_mess = "Username or Password Incorrect";
                                return view('/Index/index',['mess' => $error_mess ]); 
                        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
                                $error_mess = "Username or Password Incorrect";
                                return view('/Index/index',['mess' => $error_mess ]); 
                        } catch (\Kreait\Firebase\Exception\Auth\UserDisabled $e) {
                                $error_mess = "Username or Password Incorrect";
                                return view('/Index/index',['mess' => $error_mess ]); 
                        } catch (\Kreait\Firebase\Exception\Auth\EmailNotFound $e) {
                                $error_mess = "Username or Password Incorrect";
                                return view('/Index/index',['mess' => $error_mess ]); 
                        } catch (\Kreait\Firebase\Exception\InvalidArgumentException $e) {
                                $error_mess = "Username or Password Incorrect";
                                return view('/Index/index',['mess' => $error_mess ]); 
                        } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
                                $error_mess = "Username or Password Incorrect";
                                return view('/Index/index',['mess' => $error_mess ]); 
                        } 
            }
        } else {
            $error_mess = "Please input all Fields! ";
            return view('/Index/index',['mess' => $error_mess ]); 
        }
    }


}